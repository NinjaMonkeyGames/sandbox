const Plugins = {
    Header: {
        open() {
            const body = document.getElementById('modalBody');
            body.innerHTML = `
                <select id="hLvl"><option value="2">Heading 2</option><option value="3">Heading 3</option><option value="6">Heading 6</option></select>
                <input type="text" id="hTxt" placeholder="Title..." style="width:100%; margin-top:10px; padding:8px;">`;
            UI.openModal('genericModal');
            document.getElementById('modalTitle').innerText = "Sub-Heading";
            document.getElementById('modalSubmit').onclick = () => {
                const lvl = document.getElementById('hLvl').value;
                const txt = document.getElementById('hTxt').value;
                Core.insert(`\n\n${"#".repeat(lvl)} ${txt}\n\n`, "");
                UI.closeAllModals();
            };
        }
    },

    Table: {
        rows: 2, cols: 2,
        open() { UI.openModal('tableModal'); this.updateUI(); },
        adjust(r, c) { this.rows += r; this.cols += c; this.updateUI(); },
        reset() { this.rows = 2; this.cols = 2; this.updateUI(); },
        updateUI() {
            const container = document.getElementById('gridContainer');
            container.innerHTML = "";
            for(let r=0; r <= this.rows; r++) {
                let tr = document.createElement('tr');
                for(let c=0; c < this.cols; c++) {
                    let cell = r === 0 ? `<th><input class="gh-in" placeholder="H${c+1}"></th>` : `<td><input class="gb-in"></td>`;
                    tr.innerHTML += cell;
                }
                container.appendChild(tr);
            }
        },
        insert() {
            const hs = Array.from(document.querySelectorAll('.gh-in')).map(i => i.value || " ");
            const bs = Array.from(document.querySelectorAll('.gb-in')).map(i => i.value || " ");
            let md = `\n| ${hs.join(' | ')} |\n| ${hs.map(() => '---').join(' | ')} |\n`;
            for(let i=0; i<this.rows; i++) md += `| ${bs.slice(i*this.cols, (i+1)*this.cols).join(' | ')} |\n`;
            Core.insert(md, ""); UI.closeAllModals();
        }
    },

    List: {
        open(type) {
            const body = document.getElementById('modalBody');
            body.innerHTML = `<div id="liCont"><input type="text" class="li-in" style="width:100%; margin-bottom:5px;"></div><button onclick="Plugins.List.addRow()">+ Add Row</button>`;
            UI.openModal('genericModal');
            document.getElementById('modalTitle').innerText = "List Builder";
            document.getElementById('modalSubmit').onclick = () => {
                let md = "\n\n";
                document.querySelectorAll('.li-in').forEach((input, i) => {
                    if(!input.value) return;
                    let prefix = type === '1.' ? `${i+1}. ` : (type === 'checkbox' ? '- [ ] ' : '- ');
                    md += prefix + input.value + "\n";
                });
                Core.insert(md + "\n", ""); UI.closeAllModals();
            };
        },
        addRow() {
            const i = document.createElement('input'); i.className = "li-in"; i.style.width="100%"; i.style.marginBottom="5px";
            document.getElementById('liCont').appendChild(i); i.focus();
        }
    },

    Code: {
        open() {
            const body = document.getElementById('modalBody');
            body.innerHTML = `
                <select id="cLng">${["javascript", "python", "html", "css", "bash"].map(l => `<option value="${l}">${l}</option>`).join('')}</select>
                <textarea id="cCode" style="width:100%; height:150px; margin-top:10px;"></textarea>`;
            UI.openModal('genericModal');
            document.getElementById('modalTitle').innerText = "Code Block";
            document.getElementById('modalSubmit').onclick = () => {
                Core.insert(`\n\n\`\`\`${document.getElementById('cLng').value}\n${document.getElementById('cCode').value}\n\`\`\`\n\n`, "");
                UI.closeAllModals();
            };
        }
    },

    TOC: {
        run() {
            let toc = "## Table of Contents\n";
            Core.editor.value.split('\n').forEach(line => {
                const match = line.match(/^(##|###) (.*)/);
                if (match) toc += `- [${match[2]}](#${Core.getSlug(match[2])})\n`;
            });
            Core.insert(`\n\n${toc}\n\n`, "");
        }
    },

    Image: {
        open() {
            const body = document.getElementById('modalBody');
            body.innerHTML = `<input type="text" id="iAlt" placeholder="Alt Text"><input type="text" id="iUrl" placeholder="URL" style="width:100%; margin-top:10px;">`;
            UI.openModal('genericModal');
            document.getElementById('modalSubmit').onclick = () => {
                Core.insert(`![${document.getElementById('iAlt').value}](${document.getElementById('iUrl').value})`, "");
                UI.closeAllModals();
            };
        }
    },

    Link: {
        open() {
            const body = document.getElementById('modalBody');
            body.innerHTML = `<input type="text" id="lTxt" placeholder="Text"><input type="text" id="lUrl" placeholder="https://..." style="width:100%; margin-top:10px;">`;
            UI.openModal('genericModal');
            document.getElementById('modalSubmit').onclick = () => {
                Core.insert(`[${document.getElementById('lTxt').value}](${document.getElementById('lUrl').value})`, "");
                UI.closeAllModals();
            };
        }
    },

    Anchor: {
        open() {
            const body = document.getElementById('modalBody');
            let opts = "";
            Core.editor.value.split('\n').forEach(l => {
                const m = l.match(/^(##|###) (.*)/);
                if(m) opts += `<option value="${Core.getSlug(m[2])}">${m[2]}</option>`;
            });
            body.innerHTML = `<select id="aSel">${opts}</select>`;
            UI.openModal('genericModal');
            document.getElementById('modalSubmit').onclick = () => {
                const sel = document.getElementById('aSel');
                Core.insert(`[${sel.options[sel.selectedIndex].text}](#${sel.value})`, "");
                UI.closeAllModals();
            };
        }
    },

    Paragraph: {
        open() {
            const body = document.getElementById('modalBody');
            body.innerHTML = `<textarea id="pTxt" style="width:100%; height:100px;"></textarea>`;
            UI.openModal('genericModal');
            document.getElementById('modalSubmit').onclick = () => {
                Core.insert(`\n\n${document.getElementById('pTxt').value}\n\n`, "");
                UI.closeAllModals();
            };
        }
    }
};