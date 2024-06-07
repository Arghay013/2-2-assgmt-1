<?php
class Graph {
    private $adjacencyList;

    public function __construct() {
        $this->adjacencyList = [];
    }

    public function addEdge($src, $dest) {
        if (!isset($this->adjacencyList[$src])) {
            $this->adjacencyList[$src] = [];
        }
        if (!isset($this->adjacencyList[$dest])) {
            $this->adjacencyList[$dest] = [];
        }
        $this->adjacencyList[$src][] = $dest;
        $this->adjacencyList[$dest][] = $src;
    }

    public function bfs($start) {
        $visited = [];
        $queue = [];

        array_push($queue, $start);
        $visited[$start] = true;

        while (count($queue) > 0) {
            $vertex = array_shift($queue);
            echo $vertex . " ";

            foreach ($this->adjacencyList[$vertex] as $neighbor) {
                if (!isset($visited[$neighbor])) {
                    array_push($queue, $neighbor);
                    $visited[$neighbor] = true;
                }
            }
        }
    }
}

// Create a graph
$graph = new Graph();
$graph->addEdge(0, 1);
$graph->addEdge(0, 2);
$graph->addEdge(1, 2);
$graph->addEdge(2, 3);
$graph->addEdge(3, 4);

// Perform BFS
$graph->bfs(0);
?>
