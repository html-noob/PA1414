<html>
    <h1>Invite people</h1>
    
    <?php
        echo "<form id='form' action='../includes/send_invite.php?id=$event_number' method='POST'>"
    ?>
        <div class="container"> 
        
            <label><b>Email</b></label>
            <label id="time-label"><b>Optional Times</b></label>
            <br>
            <!--<input type="text" placeholder="Enter Email" name="email" required>
            
            <input type="text" id="pot-time" placeholder="potential viable time" name="pot-time">-->
            
            <textarea id="text-area-email" name="email" rows="5" cols="33" placeholder="seperate each email by enter..." required></textarea>
            
            <textarea id="text-area-time" name="time" rows="5" cols="33" placeholder="HH:MM &#10;HH:MM&#10;etc..."></textarea>

            <button type="submit" name="submit">Send invitation</button>
        </div>
    </form>
    <!--<script src="../javascript/script.js"></script>-->
</html>