<?php namespace Recipes\Presenters;

use DB;
use Recipe;
use dflydev\markdown\MarkdownExtraParser;

class RecipePresenter extends Presenter
{
    protected static $tags_search = [
        '{bash}',
        '{bash-lines}',
        '{/bash}',
        '{html}',
        '{html-lines}',
        '{/html}',
        '{javascript}',
        '{/javascript}',
        '{php}',
        '{php-lines}',
        '{/php}',
        '{ruby}',
        '{/ruby}',
        "{text}\n",
        '{/text}',
        '{tip}',
        '{/tip}',
        '{warn}',
        '{/warn}',
        '](images/',
    ];
    protected static $tags_replace = [
        '<pre class="prettyprint lang-bash">{entities}',
        '<pre class="prettyprint linenums lang-bash">{entities}',
        '{/entities}</pre>',
        '<pre class="prettyprint lang-html">{entities}',
        '<pre class="prettyprint linenums lang-html">{entities}',
        '{/entities}</pre>',
        '<pre class="prettyprint lang-javascript">{entities}',
        '{/entities}</pre>',
        '<pre class="prettyprint">{entities}',
        '<pre class="prettyprint linenums">{entities}',
        '{/entities}</pre>',
        '<pre class="prettyprint lang-ruby">{entities}',
        '{/entities}</pre>',
        '<pre class="prettyprint"><span class="nocode">{entities}',
        '{/entities}</span></pre>',
        '<div class="well well-sm recipe-block"><div class="col-xs-1"><i class="fa fa-thumbs-up fa-3x text-success"></i></div><div class="col-xs-11" markdown="1">',
        '</div><div class="clearfix"></div></div>',
        '<div class="well well-sm recipe-block"><div class="col-xs-1"><i class="fa fa-warning fa-3x text-danger"></i></div><div class="col-xs-11" markdown="1">',
        '</div><div class="clearfix"></div></div>',
        '](/images/',
    ];

    protected $markdown;
    protected $nextLink;
    protected $nextTitle;
    protected $prevLink;
    protected $prevTitle;

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->markdown = new MarkdownExtraParser;

        $this->figureNextPrev();
    }

    /**
     * Figure the next and previous links
     */
    protected function figureNextPrev()
    {
        $rows = Recipe::join('categories', 'recipes.category_id', '=', 'categories.id')
            ->join('sections', 'categories.section_id', '=', 'sections.id')
            ->orderBy('sections.position')
            ->orderBy('categories.position')
            ->orderBy('recipes.position')
            ->get(['recipes.id', 'recipes.title', 'categories.slug'])
            ->toArray();
        $numRows = count($rows);
        $last = $rows[$numRows - 1];
        $this->prevLink = '/recipes/'.$last['id'];
        $this->prevTitle = $last['title'];
        $rows[] = $rows[0];
        for ($i = 0; $i < $numRows; $i++)
        {
            if ($this->id == $rows[$i]['id'])
            {
                $next = $rows[$i + 1];
                $this->nextLink = '/recipes/'.$next['id'];
                $this->nextTitle = $next['title'];
                break;
            }
            $this->prevLink = '/recipes/'.$rows[$i]['id'];
            $this->prevTitle = $rows[$i]['title'];
        }
    }

    /**
     * Return display code for discussion
     */
    public function discussion()
    {
        $text = $this->replacements($this->resource->discussion);
        $text = $this->addHeader('fa-comments', 'Discussion', $text);
        return $this->markdown->transformMarkdown($text);
    }

    /**
     * Return display code for problem
     */
    public function problem()
    {
        $text = $this->replacements($this->resource->problem);
        $text = $this->addHeader('fa-question', 'Problem', $text);
        return $this->markdown->transformMarkdown($text);
    }

    /**
     * Return display code for solution
     */
    public function solution()
    {
        $text = $this->replacements($this->resource->solution);
        $text = $this->addHeader('fa-info', 'Solution', $text);
        return $this->markdown->transformMarkdown($text);
    }

    /**
     * Add a beginning icon box to the code
     */
    protected function addHeader($icon, $title, $text)
    {
        $lines = explode("\n", trim($text));
        $first_line = array_shift($lines);
        $first_line = $this->markdown->transformMarkdown($first_line);
        $banner = [];
        $banner[] = '<div class="recipe-header">';
        $banner[] = ' <span class="fa-stack fa-2x pull-left">';
        $banner[] = '  <i class="fa fa-circle fa-stack-2x"></i>';
        $banner[] = '  <i class="fa '.$icon.' fa-stack-1x fa-inverse"></i>';
        $banner[] = ' </span>';
        $banner[] = ' <div class="recipe-text pull-left">';
        $banner[] = ' <h4 class="h3">'.$title.'</h4>';
        $banner[] = $first_line;
        $banner[] = ' </div>';
        $banner[] = '</div>';
        $banner[] = '<div class="clearfix"></div>';
        $lines = array_merge($banner, $lines);
        return join("\n", $lines);
    }

    /**
     * Replace tags blocks
     */
    protected function replacements($text)
    {
        $text = str_replace(
            static::$tags_search,
            static::$tags_replace,
            $text
        );

        // Manually fix entities
        while (($start = strpos($text, '{entities}')) !== false)
        {
            $end = strpos($text, '{/entities}', $start);
            $text = substr($text, 0, $start)
                . e(substr($text, $start + 10, $end - $start - 10))
                . substr($text, $end + 11);
        }

        // Fix crosslinks
        if (preg_match_all('!\[\[(.*)\]\]!', $text, $matches))
        {
            foreach ($matches[1] as $match)
            {
                $recipe = Recipe::whereTitle($match)->with('category')->first();
                if ($recipe)
                {
                    $search = "[[$match]]";
                    $replace = "[$match](/recipes/" . $recipe->id . ')';
                    $text = str_replace($search, $replace, $text);
                }
            }
        }

        return $text;
    }

    /**
     * Return next/prev links and titles
     */
    public function nextLink()
    {
        return $this->nextLink;
    }
    public function prevLink()
    {
        return $this->prevLink;
    }
    public function nextTitle()
    {
        return $this->nextTitle;
    }
    public function prevTitle()
    {
        return $this->prevTitle;
    }
}