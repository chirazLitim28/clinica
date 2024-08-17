<?php

class Pagination
{
    private $total_records;
    private $records_per_page;

    public function __construct($total_records, $records_per_page)
    {
        $this->total_records = $total_records;
        $this->records_per_page = $records_per_page;
    }

    public function getCurrentPage()
    {
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        return $current_page;
    }

    public function getPreviousLink($page_url)
    {
        $current_page = $this->getCurrentPage();
        if ($current_page > 1) {
            return "<a href='$page_url?page=" . ($current_page - 1) . "' class='pagination-link prev'>Previous</a>";
        }
        return '';
    }

    public function getPaginationLinks($page_url)
    {
        $total_pages = ceil($this->total_records / $this->records_per_page);
        $current_page = $this->getCurrentPage();
        $pagination_links = '<div class="pagination-container">';
        for ($i = 1; $i <= $total_pages; $i++) {
            $active = $i == $current_page ? 'active' : '';
            $pagination_links .= "<a href='$page_url?page=$i' class='pagination-link $active'>$i</a>";
        }
        $pagination_links .= '</div>';
        return $pagination_links;
    }

    public function getNextLink($page_url)
    {
        $total_pages = ceil($this->total_records / $this->records_per_page);
        $current_page = $this->getCurrentPage();
        if ($current_page < $total_pages) {
            return "<a href='$page_url?page=" . ($current_page + 1) . "' class='pagination-link next'>Next</a>";
        }
        return '';
    }
}
