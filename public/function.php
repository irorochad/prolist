<?php 

// Function to fetch project slug urls
function getSlugUrl($slug_string)
{

    $slug = preg_replace('/[^a-z0-9-]+/', '-', strtolower($slug_string));
    return $slug;
}
