<?php
    /**
     * MacroParse plugin: parse contents AFTER replacing macros by values
     *
     * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
     * @author     Julius Verrel (jv.git@posteo.de)
     */
     
    // must be run within Dokuwiki
    if (!defined('DOKU_INC')) die();
     
    class syntax_plugin_copylink extends DokuWiki_Syntax_Plugin
    {
        function getInfo(){
            return array(
                'author' => 'Julius Verrel',
                'email'  => 'jv.git@posteo.de',
                'date'   => '2018-10-18',
                'name'   => 'CopyLink Plugin',
                'desc'   => 'copy link of current page to clipboard',
                'url'    => '...',
            );
        }
     
        function getType(){
            return "protected";
        }
     
        function getPType(){
            return "normal";
        }
     
        function getSort(){
            return 0;
        }
     
        function connectTo( $mode ) {
            $this->Lexer->addEntryPattern("<copylink>",$mode,"plugin_copylink");
        }
     
        function handle( $match, $state, $pos, Doku_Handler $handler ){
            return array($state,$match);
        }
     
        function render( $mode, Doku_Renderer $renderer, $data ) {
            global $ID;
        //    if($mode == 'xhtml'){
				$renderer->doc .= '<a id="myLink" href="#" onclick="copyCurrentPageToClipboard(); return false;">Copy internal link</a>';
                return true;
        //    }
        //    return false;
        }
    }
