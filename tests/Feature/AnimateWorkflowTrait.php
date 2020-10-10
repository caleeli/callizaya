<?php

namespace Tests\Feature;

use DOMDocument;
use JDD\Workflow\Models\Process;
use function GuzzleHttp\json_encode;

trait AnimateWorkflowTrait
{
    /**
     * Animation svg dom document
     *
     * @var DOMDocument $animateWorkflowSvg
     */
    private $animateWorkflowSvg;
    /**
     * @var \DOMElement $animateWorkflowSvgScript
     */
    private $animateWorkflowSvgScript;
    private $animateWorkflowSvgSaved;

    private $animationStyle = '.highlight rect, .highlight ellipse {stroke-width: 2; fill-opacity: 0.25} '.
    '.red rect, .red ellipse {stroke: red;} ' .
    '.green rect, .green ellipse {stroke: green;} ' .
    '.black rect, .black ellipse {stroke: black;} ';

    public function setupAnimateWorkflowTrait()
    {
        AnimateWorkflowObserver::$unitTest = $this;
        $this->animateWorkflowSvgSaved = md5(get_class($this) . '::' . $this->getName()) . '.svg';
        Process::observe(AnimateWorkflowObserver::class);
    }

    public function renderProcess($svgfile)
    {
        $animateWorkflowSvg = new DOMDocument();
        $animateWorkflowSvg->loadXML(file_get_contents($svgfile));
        $animateWorkflowSvg->documentElement->removeAttribute('width');
        $animateWorkflowSvg->documentElement->removeAttribute('height');
        $animateWorkflowSvg->documentElement->setAttribute('onload', 'init(evt)');
        $this->animateWorkflowSvgScript = $animateWorkflowSvg->createElement('script');
        $animateWorkflowSvg->documentElement->appendChild($this->animateWorkflowSvgScript);
        $this->animateWorkflowSvgScript->nodeValue = <<<EOD
        var a=[];function init(evt) {
            var i=0;setInterval(function() {i<a.length ? a[i++]() : i=0}, 1000);
        }
EOD;
        $this->animateWorkflowSvgStyle = $animateWorkflowSvg->createElement('style');
        $animateWorkflowSvg->documentElement->appendChild($this->animateWorkflowSvgStyle);
        $this->animateWorkflowSvgStyle->nodeValue = $this->animationStyle;
        $this->animateWorkflowSvg = $animateWorkflowSvg;
        $this->saveAnimation();
    }

    public function highlightG(array $array)
    {
        $this->animateWorkflowSvgScript->nodeValue .= sprintf('a.push(function () {var ee=document.getElementsByClassName("highlight");' .
            'while(ee.length) ee[0].removeAttribute("class");' .
            '%s.forEach(function (e) {var n=document.getElementById(e.id);n?n.setAttribute("class", "highlight " + e.color):null;});' .
            '});', json_encode($array));
        $this->saveAnimation();
    }

    private function saveAnimation()
    {
        $this->animateWorkflowSvg->save('coverage/' . $this->animateWorkflowSvgSaved);
    }
}
