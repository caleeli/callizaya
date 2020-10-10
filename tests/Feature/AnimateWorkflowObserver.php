<?php

namespace Tests\Feature;

use JDD\Workflow\Models\Process;
use JDD\Workflow\Facades\Workflow;

class AnimateWorkflowObserver
{
    public static $unitTest;

    public function created(Process $process)
    {
        self::$unitTest->renderProcess(Workflow::getProcessSvg($process->bpmn));
        $this->highlightTokens($process);
    }

    public function updated(Process $process)
    {
        $this->highlightTokens($process);
    }

    private function highlightTokens(Process $process)
    {
        $array = [];
        foreach ($process->tokens as $token) {
            $color = $token['status'] === 'FAILING' ? 'red' : 'green';
            $array[] = [
                'id' => $token['element'],
                'color' => $color
            ];
        }
        self::$unitTest->highlightG($array);
    }
}
