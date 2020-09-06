<?php
class af_oboobs_large extends Plugin {

    private $host;

    function about() {
        return array(1.0,
                "Display large images in oboobs.ru feed",
                "qiwichupa");
    }

    function init($host) {
        $host->add_hook($host::HOOK_ARTICLE_FILTER, $this);
    }

    function hook_article_filter($article) {

        if (strpos($article['link'], 'feedproxy.google.com/~r/oboobs-all') === false) return $article; // skip other URLs

        $article['content'] = str_replace('boobs_preview', 'boobs', $article['content']);
        return $article;
    }

    function api_version() {
      return 2;
    }
}
?>
