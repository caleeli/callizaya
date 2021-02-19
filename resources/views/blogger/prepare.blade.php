<html>

<head>
    <title>Blogger</title>
</head>

<body>
    <style>
        .border {
            border: 3px double black;
            min-height: 8em;
        }

        .btn {
            background-color: lightpink;
        }
    </style>
    <button>Pega tu texto aca debajo:</button>
    <button onclick="limpiar()">Limpiar formato</button>
    <button onclick="copy()">Copiar</button>
    <div id="paginaBlog" contentEditable="true" class="border"></div>
    <div id="inject">
        <style>
            .tabla {
                width: 100%;
                border: 1px solid;
                border-collapse: collapse;
            }

            .tabla td {
                border: 1px solid;
            }

            .tab-tabs button {
                border: none;
                background-color: lightgray;
                color: white;
                margin-right: 4px;
            }

            .tab-tabs .tab-active {
                border: 1px solid aliceblue;
                background-color: white;
                color: black;
            }

            .tab-body {
                border: 1px solid aliceblue;
                background-color: white;
                box-shadow: 10px 10px 5px 0px lightgray;
                -webkit-box-shadow: 10px 10px 5px 0px lightgray;
                -moz-box-shadow: 10px 10px 5px 0px lightgray;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
        <script type="text/x-template" id="tabs-template">
            <div>
    <div class="tab-tabs">
        <button v-for="tab in tabs" :key="tab.title" :class="{'tab-active':tab===active}" @click="active=tab;$event.target.blur();">@{{tab.title}}</button>
    </div>
    <div class="tab-body" v-html="active && active.body"></div>
  </div>
</script>
        <script>
            Vue.component('tabs', {
                template: '#tabs-template',
                props: ['tabs'],
                data() {
                    return {
                        active: this.tabs[0]
                    }
                },
            });
            new Vue({
                el: "#paginaBlog"
            });
        </script>
    </div>
    <script>
        function limpiar(div) {
            if (!div) {
                div = window.document.getElementById('paginaBlog');
            } else {
                if (div.removeAttribute) {
                    div.removeAttribute('class');
                    div.removeAttribute('style');
                    div.removeAttribute('lang');
                }
            }
            if (div.nodeName === 'TABLE') {
                div.setAttribute('class', 'tabla');
                div.removeAttribute('width');
            }
            for (let i = 0; i < div.childNodes.length; i++) {
                const ch = div.childNodes[i];
                if (ch.nodeName === 'STYLE') {
                    div.removeChild(ch);
                    i--;
                } else if (ch.nodeName === 'FONT') {
                    while (ch.firstChild) {
                        div.insertBefore(ch.firstChild, ch);
                    }
                    div.removeChild(ch);
                    i--;
                } else {
                    limpiar(ch);
                }
                if (ch.nodeName === 'TABLE') {
                    const btn = window.document.createElement('button');
                    btn.className = 'btn';
                    btn.innerHTML = 'Convertir a Pestañas';
                    btn.onclick = () => {
                        convertToTabs(ch, btn)
                    };
                    div.insertBefore(btn, ch);
                    i++;
                }
            }
        }

        function removeSpecial(div) {
            for (let i = 0; i < div.childNodes.length; i++) {
                const ch = div.childNodes[i];
                if (ch.nodeName === 'BUTTON' && ch.className === 'btn') {
                    div.removeChild(ch);
                    i--;
                }
                if (ch.childNodes) removeSpecial(ch);
            }
        }

        function createTabs() {
            return {
                tabs: [],
                addTab(title, body) {
                    this.tabs.push({
                        title,
                        body
                    });
                },
                build() {
                    const div = window.document.createElement('div');
                    const tabs = this.tabs.map(({title}, index) => `<button ${index ? '' : 'class="tab-active"'}><u>${title}</u></button>`);
                    const bodies = this.tabs.map(({body}, index) => `<div ${index ? 'style="display:none"' : 'class="tab-body"'}>${body}</div>`);
                    div.innerHTML = `<tabs><div class="tab-tabs">${tabs.join('')}</div>${bodies.join('')}</tabs>`;
                    div.firstChild.setAttribute(':tabs', JSON.stringify(this.tabs));
                    return div.firstChild;
                },
            };
        }

        function convertToTabs(table, btn) {
            const tabs = createTabs();
            for (let r = 0; r < table.tBodies[0].rows.length; r++) {
                tabs.addTab(table.tBodies[0].rows[r].cells[0].innerText, table.tBodies[0].rows[r].cells[1].innerHTML);
            }
            table.parentNode.insertBefore(tabs.build(), table);
            table.parentNode.removeChild(btn);
            table.parentNode.removeChild(table);
        }

        function copy() {
            const div = window.document.getElementById('paginaBlog').cloneNode(true);
            const inject = window.document.getElementById('inject').innerHTML;
            removeSpecial(div);
            const str = `<div id="paginaBlog">${div.innerHTML}</div>${inject}`;

            function listener(e) {
                e.clipboardData.setData("text/html", str);
                e.clipboardData.setData("text/plain", str);
                e.preventDefault();
            }
            document.addEventListener("copy", listener);
            document.execCommand("copy");
            document.removeEventListener("copy", listener);
        }
    </script>
</body>

</html>