<?php

namespace Core;

class Pagination
{
    public int $countPages = 1;
    public int $currentPage = 1;
    public string $uri = '';
    public int $midSize = 1;
    public int $allPages = 7;

    public function __construct(
        public int $page = 1,
        public int $perPage = 1,
        public int $total = 1,
    ) {
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage();
        $this->uri = $this->getParams();
        $this->midSize = $this->getMidSize();
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

    private function getMidSize(): int
    {
        return $this->countPages <= $this->allPages ? $this->countPages : $this->midSize;
    }

    public function getStart(): int
    {
        return ($this->currentPage - 1) * $this->perPage;
    }

    public function __toString(): string
    {
        return $this->getHtml();
    }

    public function getHtml(): string
    {
        $back = '';
        $forward = '';
        $startPage = '';
        $endPage = '';
        $pagesLeft = '';
        $pagesRight = '';

        if ($this->currentPage > 1) {
            $back = "<li class='page-item'><a href='" . $this->getLink($this->currentPage - 1) . "' class='page-link'>&lt;</a></li>";
        }

        if ($this->currentPage < $this->countPages) {
            $forward = "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->currentPage + 1) . "'>&gt;</a></li>";
        }

        if ($this->currentPage > $this->midSize + 1) {
            $startPage = "<li class='page-item'><a class='page-link' href='" . $this->getLink(1) . "'>&laquo;</a></li>";
        }

        if ($this->currentPage < ($this->countPages - $this->midSize)) {
            $endPage = "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->countPages) . "'>&raquo;</a></li>";
        }

        for ($i = $this->midSize; $i > 0; $i--) {
            if ($this->currentPage - $i > 0) {
                $pagesLeft .= "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->currentPage - $i) . "'>" . ($this->currentPage - $i) . "</a></li>";
            }
        }

        for ($i = 1; $i <= $this->midSize; $i++) {
            if ($this->currentPage + $i <= $this->countPages) {
                $pagesRight .= "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->currentPage + $i) . "'>" . ($this->currentPage + $i) . "</a></li>";
            }
        }

        return '<nav aria-label="Page navigation example"><ul class="pagination">' . $startPage . $back . $pagesLeft . '<li class="page-item active"><a class="page-link">' . $this->currentPage . '</a></li>' . $pagesRight . $forward . $endPage . '</ul></nav>';
    }

    private function getLink($page): string
    {
        if ($page == 1) {
            return rtrim($this->uri, '?&');
        }

        if (str_contains($this->uri, '&') || str_contains($this->uri, '?')) {
            return "{$this->uri}page={$page}";
        }

        return "{$this->uri}?page={$page}";
    }
}
