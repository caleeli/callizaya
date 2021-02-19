<style>
    .border {
        border: 3px double black;
        min-height: 8em;
    }
</style>
<button>Pega tu texto aca debajo:</button>
<button onclick="limpiar()">Limpiar formato</button>
<button onclick="copy()">Copiar</button>
<div id="div" contentEditable="true" class="border"></div>
<script>
    function limpiar(div) {
        if (!div) {
            div = window.document.getElementById('div');
        } else {
            if (div.removeAttribute) {
                div.removeAttribute('class');
                div.removeAttribute('style');
                div.removeAttribute('lang');
            }
        }
        for(let i =0; i<div.childNodes.length; i++ ) {
            const ch = div.childNodes[i];
            if (ch.nodeName === 'STYLE') {
                div.removeChild(ch);
                i--;
            } else if (ch.nodeName === 'FONT') {
                while(ch.firstChild) {
                    div.insertBefore(ch.firstChild, ch);
                }
                div.removeChild(ch);
                i--;
            } else {
                limpiar(ch);
            }
        }
    }

    function copy() {
        const div = window.document.getElementById('div');
        const str = div.innerHTML;
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