<?php

namespace App\Domain;

class Product_domain
{
    public int $id;
    public string $name;
    public string $code;
    public int $category_id;
    public string $type; /* demo | product */
    public int $price;
    public string $link_locate;
    public ?array $css_external = NULL;
    public ?array $js_external = NULL;
    public ?string $css_internal = NULL;
    public string $body;
    public ?string $js_internal = NULL;
}
