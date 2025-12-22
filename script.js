const gfm_langs = ["bash", "c", "cpp", "csharp", "css", "go", "html", "java", "javascript", "json", "python", "ruby", "rust", "sql", "typescript", "xml", "yaml"];
const editor = document.getElementById('editor'), 
      preview = document.getElementById('preview'), 
      lineNumbers = document.getElementById('lineNumbers'),
      previewLineNumbers = document.getElementById('previewLineNumbers'),
      overlay = document.getElementById('overlay'), 
      titleInput = document.getElementById('mainTitle'),
      titleDisplay = document.getElementById('editor-title-display'),
      stats = document.getElementById('stats');

function closeAllModals() {
    document.querySelectorAll('.modal').forEach(m => m.style.display = 'none');
    overlay.style.display = 'none';
}

function cleanBlankLines() {
    const cleaned = editor.value.replace(/\n{3,}/g, '\n\n');
    if (editor.value !== cleaned) {
        const start = editor.selectionStart;
        const end = editor.selectionEnd;
        editor.value = cleaned;
        editor.setSelectionRange(start, end);
    }
}

function updateLineNumbers() {
    const titleText = titleInput.value.trim();
    const lines = editor.value.split('\n');
    let totalLines = lines.length;
    if(titleText) totalLines += 2; 
    const lineArr = Array.from({length: totalLines}, (_, i) => `<span>${i + 1}</span>`).join('');
    lineNumbers.innerHTML = lineArr;
    previewLineNumbers.innerHTML = lineArr;
}

function syncScroll(source) {
    if (source === 'editor') lineNumbers.scrollTop = editor.scrollTop;
    else previewLineNumbers.scrollTop = preview.scrollTop;
}

function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
    const isDark = document.body.classList.contains('dark-mode');
    localStorage.setItem('builder-theme', isDark ? 'dark' : 'light');
    document.getElementById('themeBtn').innerText = isDark ? '☀️ Light Mode' : '🌙 Dark Mode';
}

if(localStorage.getItem('builder-theme') === 'dark') toggleDarkMode();

function handleInput() {
    cleanBlankLines();
    titleDisplay.innerText = titleInput.value.trim() ? "# " + titleInput.value.trim() : "";
    updateLineNumbers();
    render();
}

function initLangs() {
    const sel = document.getElementById('codeLangSelect');
    if(!sel) return;
    sel.innerHTML = '<option value="">(Plain Text)</option>';
    gfm_langs.sort().forEach(l => {
        const opt = document.createElement('option');
        opt.value = l; opt.innerText = l;
        sel.appendChild(opt);
    });
}
initLangs();

function getSlug(text) { return text.toLowerCase().trim().replace(/[^\w\s-]/g, '').replace(/[\s_-]+/g, '-').replace(/^-+|-+$/g, ''); }

function insert(before, after, customText = null) {
    const start = editor.selectionStart, end = editor.selectionEnd;
    const val = before + (customText || editor.value.substring(start, end)) + after;
    editor.value = editor.value.substring(0, start) + val + editor.value.substring(end);
    handleInput();
}

function openExampleModal() { 
    document.getElementById('exampleVarInput').value = "";
    document.getElementById('exampleModal').style.display = 'block'; 
    overlay.style.display = 'block'; 
    document.getElementById('exampleVarInput').focus();
}

function insertExampleFinal() {
    const val = document.getElementById('exampleVarInput').value.trim() || "example text";
    insert(`_example_ ${val}`, ""); closeAllModals();
}

function openGlossaryModal() { document.getElementById('glossaryModal').style.display = 'block'; overlay.style.display = 'block'; }
function insertGlossaryFinal() {
    const term = document.getElementById('glossaryTerm').value.trim();
    const desc = document.getElementById('glossaryDesc').value.trim();
    const slug = getSlug(term);
    const linkMd = `[${term}](#${slug})`;
    let content = editor.value;
    const gHeader = "## Glossary";
    const row = `| ${term} | ${desc} |\n`;
    if (content.includes(gHeader)) {
        editor.value = content.trimEnd() + "\n" + row;
    } else {
        editor.value = content.trimEnd() + "\n\n---\n\n" + gHeader + "\n| Term | Description |\n| --- | --- |\n" + row;
    }
    insert(linkMd, ""); closeAllModals();
}

function openAssetModal() { document.getElementById('assetModal').style.display = 'block'; overlay.style.display = 'block'; }
function autoGuessType() {
    const file = document.getElementById('assetFilename').value;
    const ext = file.includes('.') ? file.split('.').pop().toUpperCase() : "";
    if(ext) document.getElementById('assetType').value = ext;
}

function insertAssetFinal() {
    const name = document.getElementById('assetFilename').value;
    const type = document.getElementById('assetType').value;
    const path = document.getElementById('assetPath').value;
    const assetMd = `\n### ASSET: ${name}\n\n| Attribute | Value |\n| --- | --- |\n| Path | ${path} |\n| Type | ${type} |\n| Managed | ${document.getElementById('assetManaged').value} |\n| CI Type | ${document.getElementById('assetCIType').value} |\n\n**Purpose**: ${document.getElementById('assetPurpose').value}\n\n**Description**: ${document.getElementById('assetDescription').value}\n`;
    insert(assetMd, ""); closeAllModals();
}

function openEmojiModal() { document.getElementById('emojiModal').style.display = 'block'; overlay.style.display = 'block'; }
function insertEmojiFinal() {
    const map = {info:'ℹ️', tip:'💡', caution:'⚠️', warning:'🚫'};
    insert(`\n> ${map[document.getElementById('emojiType').value]} **${document.getElementById('emojiType').value.toUpperCase()}**: ${document.getElementById('emojiText').value}\n`, ""); closeAllModals();
}

function openCodeModal() { document.getElementById('codeModal').style.display = 'block'; overlay.style.display = 'block'; }
function insertCodeFinal() { 
    const lang = document.getElementById('codeLangSelect').value || "text";
    insert(`\n\`\`\`${lang}\n${document.getElementById('codeContent').value}\n\`\`\`\n`, ""); closeAllModals(); 
}

function openTableModal() { document.getElementById('tableModal').style.display = 'block'; overlay.style.display = 'block'; updateGridUI(); }

let rows = 2, cols = 2;
function resetGrid() { rows = 2; cols = 2; updateGridUI(); }
function adjustGrid(r, c) { 
    if(rows + r >= 1) rows += r; 
    if(cols + c >= 1) cols += c; 
    updateGridUI(); 
}

function updateGridUI() {
    const head = document.getElementById('gridHead');
    const body = document.getElementById('gridBody');
    const currentHeadData = Array.from(head.querySelectorAll('input')).map(i => i.value);
    const currentBodyData = Array.from(body.querySelectorAll('tr')).map(tr => Array.from(tr.querySelectorAll('input')).map(i => i.value));
    head.innerHTML = ""; body.innerHTML = "";
    for(let j=0; j<cols; j++) {
        const val = currentHeadData[j] || "";
        head.innerHTML += `<th><input placeholder="Col" value="${val}"></th>`;
    }
    for(let i=0; i<rows; i++) {
        let rowHtml = "<tr>";
        for(let j=0; j<cols; j++) {
            const val = (currentBodyData[i] && currentBodyData[i][j]) ? currentBodyData[i][j] : "";
            rowHtml += `<td><input value="${val}"></td>`;
        }
        body.innerHTML += rowHtml + "</tr>";
    }
}

function insertTableFinal() {
    let md = "\n| " + Array.from(document.querySelectorAll('#gridHead input')).map(i => i.value || "Header").join(" | ") + " |\n";
    md += "| " + Array.from({length: cols}, () => "---").join(" | ") + " |\n";
    document.querySelectorAll('#gridBody tr').forEach(tr => {
        md += "| " + Array.from(tr.querySelectorAll('input')).map(i => i.value || " ").join(" | ") + " |\n";
    });
    insert(md, ""); closeAllModals();
}

function openLinkModal() { document.getElementById('linkModal').style.display = 'block'; overlay.style.display = 'block'; }
function insertLinkFinal() { 
    insert(`[${document.getElementById('linkText').value}](${document.getElementById('linkUrl').value})`, ""); closeAllModals(); 
}

function openImageModal() { document.getElementById('imageModal').style.display = 'block'; overlay.style.display = 'block'; }
function insertImageFinal() { 
    const alt = document.getElementById('imgAlt').value || "Image Description";
    insert(`![${alt}](${document.getElementById('imgUrl').value})`, ""); closeAllModals(); 
}

function openParaModal() { document.getElementById('paraModal').style.display = 'block'; overlay.style.display = 'block'; }
function insertParagraphFinal() { insert(`\n${document.getElementById('paraTextArea').value}\n`, ""); closeAllModals(); }

function openHeaderModal() { document.getElementById('headerModal').style.display = 'block'; overlay.style.display = 'block'; }
function insertHeaderFinal() { 
    insert(`\n${'#'.repeat(document.getElementById('headerLevel').value)} ${document.getElementById('headerText').value}\n`, ""); closeAllModals(); 
}

function openAnchorModal() {
    const sel = document.getElementById('anchorSelect'); sel.innerHTML = "";
    editor.value.split('\n').forEach(line => {
        if(line.startsWith('#')) {
            const txt = line.replace(/^#+\s+/, '');
            const opt = document.createElement('option'); opt.value = getSlug(txt); opt.innerText = txt; sel.appendChild(opt);
        }
    });
    document.getElementById('anchorModal').style.display = 'block'; overlay.style.display = 'block';
}
function insertAnchorFinal() { insert(`[Link](#${document.getElementById('anchorSelect').value})`, ""); closeAllModals(); }

function openListModal(type) {
    document.getElementById('listItemsContainer').innerHTML = "";
    document.getElementById('listTitle').innerText = (type === 'checkbox') ? "Add Checklist" : "Add List Items";
    document.getElementById('listSubmitBtn').onclick = () => insertListFinal(type);
    addListRow();
    document.getElementById('listModal').style.display = 'block'; overlay.style.display = 'block';
}

function addListRow() {
    const div = document.createElement('div');
    div.innerHTML = `<input type="text" class="list-item-input" style="width:85%"> <button onclick="this.parentElement.remove()" style="background:red; color:white">X</button>`;
    document.getElementById('listItemsContainer').appendChild(div);
}

function insertListFinal(type) {
    let md = "\n";
    document.querySelectorAll('.list-item-input').forEach(i => {
        if(type === 'checkbox') md += `- [ ] ${i.value}\n`;
        else md += `- ${i.value}\n`;
    });
    insert(md, ""); closeAllModals();
}

function insertTOC() {
    let toc = "\n## Table of Contents\n";
    editor.value.split('\n').forEach(line => {
        if(line.startsWith('#')) {
            const txt = line.replace(/^#+\s+/, '');
            toc += `- [${txt}](#${getSlug(txt)})\n`;
        }
    });
    insert(toc, "");
}

function render() {
    const blocks = editor.value.split(/\n\n+/);
    preview.innerHTML = titleInput.value.trim() ? `<h1 id="top">${titleInput.value}</h1>` : "";
    blocks.forEach((block, index) => {
        if (!block.trim()) return;
        const div = document.createElement('div');
        div.className = 'preview-item';
        div.dataset.raw = encodeURIComponent(block);
        div.innerHTML = `<div class="preview-controls"><div class="gui-btn gui-drag">☰</div><div class="gui-btn gui-del" onclick="deleteBlock(${index})">✕</div></div>`;
        
        let html = block
            .replace(/^(#{1,6})\s+(.*$)/gim, (match, hashes, text) => {
                const level = hashes.length;
                return `<h${level} id="${getSlug(text)}">${text}</h${level}>`;
            })
            .replace(/!\[(.*?)\]\((.*?)\)/gim, '<img alt="$1" src="$2">')
            .replace(/\[(.*?)\]\((.*?)\)/gim, (match, text, url) => {
                if (url.startsWith('#')) return `<a onclick="document.getElementById('${url.substring(1)}')?.scrollIntoView({behavior:'smooth'})">${text}</a>`;
                return `<a href="${url}" target="_blank">${text}</a>`;
            })
            .replace(/\*\*(.*?)\*\*/gim, '<strong>$1</strong>')
            .replace(/\*(.*?)\*/gim, '<em>$1</em>')
            .replace(/_(.*?)_/gim, '<em>$1</em>')
            .replace(/`(.*?)`/gim, '<code>$1</code>')
            .replace(/\|(.+)\|/g, (m) => m.match(/^[|\s-]+$/) ? '' : '<tr>' + m.split('|').filter(c => c.trim() !== "").map(c => `<td>${c}</td>`).join('') + '</tr>')
            .replace(/\n/g, '<br>');

        if (html.includes('<tr>')) html = `<table>${html}</table>`.replace(/<br>|<table><\/table>/g, '');
        const span = document.createElement('span'); span.innerHTML = html;
        div.appendChild(span); preview.appendChild(div);
    });
    
    const words = editor.value.trim() ? editor.value.trim().split(/\s+/).length : 0;
    stats.innerText = `Words: ${words}`;
}

function deleteBlock(index) {
    const blocks = editor.value.split(/\n\n+/);
    blocks.splice(index, 1);
    editor.value = blocks.join('\n\n');
    handleInput();
}

function clearAll() {
    if(confirm("Clear everything?")) {
        editor.value = "";
        titleInput.value = "";
        handleInput();
    }
}

function copyToClipboard() {
    const fullContent = (titleInput.value ? `# ${titleInput.value}\n\n` : "") + editor.value;
    navigator.clipboard.writeText(fullContent).then(() => alert("Copied!"));
}

function downloadMD() {
    const fullContent = (titleInput.value ? `# ${titleInput.value}\n\n` : "") + editor.value;
    const blob = new Blob([fullContent], {type: "text/markdown"});
    const a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = (titleInput.value || "document") + ".md";
    a.click();
}

function toggleLock() {
    editor.disabled = document.getElementById('lockEditor').checked;
}

handleInput();