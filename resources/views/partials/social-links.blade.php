<div class="buttons-social-media-share">
    <ul class="share-buttons">
        <li>
        	<a href="https://www.facebook.com/sharer/sharer.php?u={{request()->fullUrl()}}&title={{$description}}" title="Compartir en Facebook" target="_blank">
        	<img alt="Compartir en Facebook" src="/img/flat_web_icon_set/Facebook.png"></a>
        </li>
              
        <li>
        	<a href="https://twitter.com/intent/tweet?url={{request()->fullUrl()}}&text={{$description}}&via=Aldea&hashtags=AldeaApp " target="_blank" title="Compartir en Twitter">
        	<img alt="Compartir en Twitter" src="/img/flat_web_icon_set/Twitter.png"></a>
        </li>
              
        <li>
        	<a href="http://pinterest.com/pin/create/link/?url={{request()->fullUrl()}}" target="_blank" title="Compartir en Pinterest">
        		<img alt="Compartir en Facebook" src="/img/flat_web_icon_set/Pinterest.png">
        	</a>
        </li>
    </ul>
</div>