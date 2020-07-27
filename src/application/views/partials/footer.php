<script src="public/js/map.show.js"></script>
<?php
$mapScriptSrc = "https://maps.googleapis.com/maps/api/js?key=" . $map_config['map_api'] . "&callback=initMap";
?>
<script src=<?php echo $mapScriptSrc ?> async defer></script>

<script src="https://cdn.rawgit.com/RobinHerbots/Inputmask/3.2.7/dist/min/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<script src="https://cdn.rawgit.com/andr-04/inputmask-multi/1.2.0/js/jquery.inputmask-multi.min.js" type="text/javascript"></script>
<script src="public/js/mask.js"></script>
</body>
</html>