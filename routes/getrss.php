Route::get('rss', function()
{
    $source = 'http://rss.cnn.com/rss/cnn_topstories.rss';

    $headers = get_headers($source);
    $response = substr($headers[0], 9, 3);
    if ($response == '404')
    {
        return 'Invalid Source';
    }
    
    $data = simplexml_load_string(file_get_contents($source));

    if (count($data) == 0)
    {
        return 'No Posts';
    }
        $posts = '';
        foreach($data->channel->item as $item)
        {
            $posts .= '<h1><a href="' . $item->link . '">'. $item->title . '</a></h1>';
            $posts .= '<h4>' . $item->pubDate . '</h4>';
            $posts .= '<p>' . $item->description . '</p>';
            $posts .= '<hr><hr>';
        }
        return $posts;
});