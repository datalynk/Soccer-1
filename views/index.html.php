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
        
        
        <div id="timer" style="width:30px;height:30px;text-align: center;line-height: 30px;padding: 10px;background:#000;color:#FFF;">0</div>
        
        <div id="match" style="width:500px;height:40px;background:green;color:#FFF;text-align:center;font-size:20px;padding: 10px;line-height: 40px;">
            Read for kickoff
        </div>
        
        <div id="start-match" style="padding:10px;background: yellow;width:100px;">Kick off</div>
        <div id="pause-match" style="padding:10px;background: blue;width:100px;">Pause match</div>
        
        <!-- JS -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="js/jquery.timer.js"></script>
        <script src="js/script.js"></script>
        <!-- End JS -->
    </body>
    
    
</html>