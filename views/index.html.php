<html>
    <head>
        <title></title>        
    </head>
    
    <body>
        <div style='position:absolute;right:0px;height:1000px;width:500px;background:#DDD;padding:10px;'>
        <h3><?php echo $match_start_info['home_team']; ?> 0 - 0 <?php echo $match_start_info['away_team']; ?></h3>
        
        <?php foreach ($match_start_info['lineups'] as $team => $team_lineup) : ?>
            <p><?php echo $match_start_info[$team . '_team']; ?> lineup:</p>
            <ul>
                <?php foreach($team_lineup as $player) : ?>

                <li><?php echo $player->getPosition(); ?> - <?php echo $player->getName(); ?></li>

                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
        </div>
        
        <!-- JS -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="js/script.js"></script>
        <!-- End JS -->
    </body>
    
    
</html>