<?php
require_once '../config/database.php';
require_once '../config/config.php';
spl_autoload_register(function ($class_name) {
    require '../app/model/' . $class_name . '.php';
});

class Pagination
{
    public static function createPageLinks(int $totalRow, int $perPage, int $page)
    {
        $preDisabled = $page == 1 ? 'disabled' : '';
        $nextDisabled = $page > ($totalRow / $perPage) ? 'disabled' : '';
        #pre
        $output = '<li class="page-item ' . $preDisabled . '">
            <a class="page-link" href="/' . BASE_URL . '/home/?page=' . ($page - 1) . '" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>';
        #page
        for ($i = 1; $i < ($totalRow / $perPage) + 1; $i++) {
            if ($i == $page) {
                $output .= ' <li class="page-item active"><a class="page-link" href="/' . BASE_URL . '/home/?page=' . ($i) . '">' . $i . '</a></li>';
            } else {
                $output .= ' <li class="page-item"><a class="page-link" href="/' . BASE_URL . '/home/?page=' . ($i) . '">' . $i . '</a></li>';
            }
        }
        #next
        $output .= '<li class="page-item ' . $nextDisabled . '">
            <a class="page-link" href="/' . BASE_URL . '/home/?page=' . ($page + 1) . '" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>';
        return $output;
    }
}
