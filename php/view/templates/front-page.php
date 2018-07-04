<?php

function showStudios($studios) {
    foreach ($studios as $id => $name) {
        echo "<option value='$id'>$name</option>";
    }
}
?>

<section class="container">
    <h2 class="center">This is a training page. Here you can make some queries to database named dvTraining</h2>
    <ul class="collapsible">
        <li>
            <p class="collapsible-header">Count summary of fees for actors in age from and to years old</p>
            <form id="feesByAge" class="collapsible-body" action="/feesByAge" method="get">
                <p class="range-field">
                    <label for="ageFrom">From this age: </label><span class="fromAgeResult"></span>
                    <input name="from_age" type="range" id="ageFrom" min="0" max="100" data-validator-rule="validate-range min" data-range-id="feeds-by-age">
                </p>
                <p class="range-field">
                    <label for="ageTo">To this age: </label><span class="toAgeResult"></span>
                    <input name="to_age" type="range" id="ageTo" min="0" max="100" data-validator-rule="validate-range max" data-range-id="feeds-by-age">
                </p>
                <button type="submit" class="waves-effect waves-teal btn-flat teal lighten-2" id="on-year">Count</button>
            </form>
        </li>
        <li>
            <p class="collapsible-header">Get info about actors who played roles in films of chosen studio</p>
            <form id="actorsByStudios" class="collapsible-body row" action="/actorsByStudios" method="get">
                <div class="input-field col s12 m4">
                    <select name="studioName" class="studio-name" data-validator-rule="validate-int">
                        <option value="" disabled selected>Choose studio</option>
                        <?php
                        showStudios($studios);
                        ?>
                    </select>
                    <label>Choose studio</label>
                </div>
                <p class="col s12">
                    <button type="submit" class="waves-effect waves-teal btn-flat teal lighten-2" id="actor-info">Find</button>
                </p>
            </form>

        </li>
        <li>
            <p class="collapsible-header">Get actors who has no namesake</p>
            <form id="namesakes" class="collapsible-body" action="/namesakes">
                <button type="submit" class="waves-effect waves-teal btn-flat teal lighten-2" id="actor-namesakes">Find</button>
            </form>
        </li>
        <li>
            <p class="collapsible-header">Count summary of fees for actors who played roles in films chosen studios for last years</p>
            <form id="actorsByLastYears" class="collapsible-body row" action="/actorsByLastYears">
                <div class="input-field col s12 m4">
                    <select name="studioName" class="studio-name" data-validator-rule="validate-int">
                        <option value="" disabled selected>Choose studio</option>
                        <?php
                        showStudios($studios);
                        ?>
                    </select>
                    <label>Choose studio</label>
                </div>
                <p class="col s12 range-field">
                    <label for="lastAges">Film was made: </label>
                    <input type="range" name="lastAges" id="lastAges" min="0" max="130">
                </p>
                <p class="col s12">
                    <button type="submit" class="waves-effect waves-teal btn-flat teal lighten-2" id="last-years">Find</button>
                </p>
            </form>
        </li>
    </ul>
</section>
