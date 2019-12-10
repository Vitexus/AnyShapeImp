Importing ...
<?php

require( dirname(__FILE__) . '/../../../../wp-blog-header.php' );
ini_set('max_execution_time', 0);

$options = get_option('anyshape-importer');

$anyshapeDB = new wpdb($options['sql-login'], $options['sql-password'], $options['sql-database'], $options['sql-host']);

//import authors;

$anyshapeAuthors = $anyshapeDB->get_results('SELECT  data_articles.author FROM `data_articles` GROUP BY author ORDER BY `author` ASC');

foreach ($anyshapeAuthors as $anyshapeAuthor) {
    $authorRaw = $anyshapeAuthor->author;
    if (strstr($authorRaw, ',')) {
        list($author, $translator) = explode(',', $authorRaw);
    } else {
        $author = $authorRaw;
    }

    $authors[trim($author)] = trim($author);
}

$currentAuthorsRaw = get_users();
foreach ($currentAuthorsRaw as $currentAuthor){
    $currentAuthors[$currentAuthor->user_login] = $currentAuthor->ID; 
}

foreach ($authors as $author) {
    $userdata = [];
    $userdata['user_nickname'] = $author;
    $userdata['user_login'] = $author;
    $userdata['user_pass'] = microtime();
    $authorId = wp_insert_user($userdata);
    $authors[$author] = is_object($authorId) ? $currentAuthors[$author] : $authorId;
}

//import categories;
//import topics;

$anyshapeArticles = $anyshapeDB->get_results('SELECT * FROM data_articles');

foreach ($anyshapeArticles as $anyshapeArticle) {
    $translator = '';
    $authorRaw = $anyshapeArticle->author;
    if (strstr($authorRaw, ',')) {
        list($author, $translator) = explode(',', $authorRaw);
    } else {
        $author = $authorRaw;
    }

    $wpPost = [
        'post_author' => $authors[trim($author)],
        'post_date' => $anyshapeArticle->created,
        'post_title' => $anyshapeArticle->title,
        'post_excerpt' => $anyshapeArticle->perex,
        'post_content' => $anyshapeArticle->text,
        'post_status' => boolval($anyshapeArticle->is_published) ? 'publish' : 'draft',
        'meta_input' => explode(',', $anyshapeArticle->tags)
    ];



    wp_insert_post($wpPost);

    echo '<br>' . $wpPost['post_title'];
    flush();
}
