const Core = {
    editor: document.getElementById('editor'),
    preview: document.getElementById('preview'),
    titleInput: document.getElementById('mainTitle'),
    stats: document.getElementById('stats'),
    historyStack: [],
    historyIndex: -1,

    init() {
        this.loadTheme();
        this.initSortable();
        this.saveState();
        this.render();
    },

    handleInput() {
        this.render();
        clearTimeout(this.typingTimer);
        this.typingTimer = setTimeout(() => this.saveState(), 500);
    },

    render() {
        const raw = this.editor.value;
        this.stats.innerText = `Words: ${raw.trim() ? raw.trim().split(/\s+/).length : 0} | Chars: ${raw.length}`;
        const blocks = raw.split(/\n\n+/);
        this.preview.innerHTML = this.titleInput.value ? `<h1 id="top">${this.titleInput.value}</h1>` : "";

        blocks.forEach((block, index) => {
            if (!block.trim()) return;
            const wrapper = document.createElement('div');
            wrapper.className = 'preview-item';
            wrapper.dataset.raw = encodeURIComponent(block);
            
            let html = this.parse(block);
            wrapper.innerHTML = `<div class="preview-controls"><div class="gui-btn gui-drag">⠿</div><div class="gui-btn gui-del" onclick="Core.deleteBlock(${index})">✕</div></div><div class="content">${html}</div>`;
            this.preview.appendChild(wrapper);
        });
    },

    parse(block) {
        return block
            .replace(/^# (.*$)/gm, (m, g1) => `<h1 id="${this.getSlug(g1)}">${g1}</h1>`)
            .replace(/^## (.*$)/gm, (m, g1) => `<h2 id="${this.getSlug(g1)}">${g1}</h2>`)
            .replace(/^### (.*$)/gm, (m, g1) => `<h3 id="${this.getSlug(g1)}">${g1}</h3>`)
            .replace(/^#### (.*$)/gm, (m, g1) => `<h4 id="${this.getSlug(g1)}">${g1}</h4>`)
            .replace(/^##### (.*$)/gm, (m, g1) => `<h5 id="${this.getSlug(g1)}">${g1}</h5>`)
            .replace(/^###### (.*$)/gm, (m, g1) => `<h6 id="${this.getSlug(g1)}">${g1}</h6>`)
            .replace(/^- \[( |x)\] (.*)/gm, `<div class="task-item"><span>$2</span></div>`)
            .replace(/^- (?!\[)(.*)/gm, '<li>$1</li>')
            .replace(/^\d+\. (.*)/gm, '<li>$1</li>')
            .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
            .replace(/\*(.*?)\*/g, '<em>$1</em>')
            .replace(/~~(.*?)~~/g, '<del>$1</del>')
            .replace(/```(\w*)\n([\s\S]*?)```/gm, '<pre><code>$2</code></pre>') 
            .replace(/`([^`]+)`/g, '<code>$1</code>') 
            .replace(/!\[(.*?)\]\((.*?)\)/g, '<img src="$2">')
            .replace(/\|(.+)\|/g, (m) => m.match(/^[|\s-]+$/) ? '' : '<tr>' + m.split('|').filter(c => c.trim() !== "").map(c => `<td>${c}</td>`).join('') + '</tr>')
            .replace(/^---$/gm, '<hr>')
            .replace(/\[(.*?)\]\((.*?)\)/g, '<a href="$2">$1</a>')
            .replace(/\n/g, '<br>')
            .replace(/(<li>.*?<\/li>)/g, '<ul>$1</ul>').replace(/<\/ul><br><ul>/g, '').replace(/<\/ul><ul>/g, '')
            .replace(/(<tr>.*?<\/tr>)/g, '<table>$1</table>').replace(/<\/table><table>/g, '');
    },

    insert(before, after, customText = null) {
        const start = this.editor.selectionStart, end = this.editor.selectionEnd;
        const val = before + (customText || this.editor.value.substring(start, end)) + after;
        this.editor.value = this.editor.value.substring(0, start) + val + this.editor.value.substring(end);
        this.handleInput();
    },

    deleteBlock(index) {
        const blocks = this.editor.value.split(/\n\n+/);
        blocks.splice(index, 1);
        this.editor.value = blocks.join('\n\n');
        this.handleInput();
    },

    getSlug(t) { return t.toLowerCase().trim().replace(/[^\w\s-]/g, '').replace(/[\s_-]+/g, '-'); },
    initSortable() {
        Sortable.create(this.preview, {
            animation: 150, handle: '.gui-drag',
            onEnd: () => {
                const items = this.preview.querySelectorAll('.preview-item');
                this.editor.value = Array.from(items).map(i => decodeURIComponent(i.dataset.raw)).join('\n\n');
                this.handleInput();
            }
        });
    },

    saveState() {
        const state = { content: this.editor.value, title: this.titleInput.value };
        if (this.historyIndex >= 0 && this.historyStack[this.historyIndex].content === state.content) return;
        this.historyStack = this.historyStack.slice(0, this.historyIndex + 1);
        this.historyStack.push(state);
        this.historyIndex = this.historyStack.length - 1;
    },

    toggleLock() { this.editor.disabled = document.getElementById('lockEditor').checked; },
    loadTheme() { if(localStorage.getItem('builder-theme') === 'dark') UI.toggleDarkMode(); },
    copy() { navigator.clipboard.writeText((this.titleInput.value ? `# ${this.titleInput.value}\n\n` : "") + this.editor.value); alert("Copied!"); },
    download() {
        const blob = new Blob([(this.titleInput.value ? `# ${this.titleInput.value}\n\n` : "") + this.editor.value], { type: 'text/markdown' });
        const a = document.createElement('a'); a.href = URL.createObjectURL(blob); a.download = `${this.titleInput.value || "doc"}.md`; a.click();
    },
    clearAll() { if(confirm("Clear document?")) { this.editor.value = ""; this.titleInput.value = ""; this.handleInput(); } }
};

const UI = {
    toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
        const isDark = document.body.classList.contains('dark-mode');
        localStorage.setItem('builder-theme', isDark ? 'dark' : 'light');
        document.getElementById('themeBtn').innerText = isDark ? '☀️ Light' : '🌙 Dark';
    },
    openModal(id) { document.getElementById(id).style.display = 'block'; document.getElementById('overlay').style.display = 'block'; },
    closeAllModals() { 
        document.querySelectorAll('.modal').forEach(m => m.style.display = 'none'); 
        document.getElementById('overlay').style.display = 'none'; 
    }
};

Core.init();