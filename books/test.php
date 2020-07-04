
<div id="newpost">
    Test text
</div>

<button id='button'>Click</button>
<script>
    var button = document.getElementById('button');

    button.onclick = function() {
        var div = document.getElementById('newpost');
        if (div.style.display !== 'none') {
            div.style.display = 'none';
        }
        else {
            div.style.display = 'block';
        }
    };
</script>
<?php