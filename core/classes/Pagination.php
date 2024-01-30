<?php

namespace Core;

class Pagination
{
    public int $countPages = 1;
    public int $currentPage = 1;
    public string $uri = '';
    public int $midSize = 2;
    public int $allPages = 7;

    public function __construct(
        public int $page = 1,
        public int $perPage = 1,
        public int $total = 1,
    )
    {
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage();
        $this->uri = $this->getParams();
    }

    protected function getCountPages(): int
    {
        return ceil($this->total / $this->perPage) ?: 1;
    }

    protected function getCurrentPage(): int
    {
        if ($this->page < 1) {
            $this->page = 1;
        }
        if ($this->page > $this->countPages) {
            $this->page = $this->countPages;
        }

        return $this->page;
    }

    protected function getParams(): string
    {

        $url = explode('?', $_SERVER['REQUEST_URI']);
        $uri = $url[0];
        if (isset($url[1]) && $url[1] != '') {
            $uri .= '?';
            $params = explode('$', $url[1]);
            foreach ($params as $param) {
                if (!str_contains($param, 'page=')) {
                    $uri .= "{$param}$";
                }
            }
        }

        return $uri;

    }

    public function getStart(): int
    {
        return ($this->currentPage - 1) * $this->perPage;
    }
}