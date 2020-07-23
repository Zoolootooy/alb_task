<script src="public/js/map.show.js"></script>
<?php
    $mapScriptSrc = "https://maps.googleapis.com/maps/api/js?key=".$map_config['map_api']."&callback=initMap";
?>
<script src=<?php echo $mapScriptSrc ?> async defer></script>
</body>
</html>