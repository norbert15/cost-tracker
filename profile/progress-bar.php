<div class="d-flex justify-content-center mt-3 progress-expend row">
    <!--Utazas-->
    <div class="progress vertical progress-transport ver-prof">
        <p class="p-percent d-flex justify-content-center p-2" data-toggle="tooltip" 
            title=" <?php echo number_format($expendPercent[0], 2) . "%" ?>">
            <?php echo number_format($expendPercent[0]) . "%" ?>
        </p>
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
            style="background-color: orange; width: <?php echo number_format($expendPercent[0]) ?>%;">
        </div>
    </div>
    <!--Elelmiszer-->
    <div class="progress vertical progress-food ver-prof">
        <p class="p-percent d-flex justify-content-center p-2" data-toggle="tooltip" 
            title=" <?php echo number_format($expendPercent[1], 2) . "%" ?>">
            <?php echo number_format($expendPercent[1]) . "%" ?>
        </p>
        <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" 
            style="background-color: dodgerblue; width: <?php echo number_format($expendPercent[1]) ?>%;">
        </div>
    </div>
    <!--Vasarlas-->
    <div class="progress vertical progress-shopping ver-prof">
        <p class="p-percent d-flex justify-content-center p-2" data-toggle="tooltip" 
            title=" <?php echo number_format($expendPercent[2], 2) . "%" ?>">
            <?php echo number_format($expendPercent[2]) . "%" ?>
        </p>
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
            style="background-color: #98786c; width: <?php echo number_format($expendPercent[2]) ?>%;">
        </div>
    </div>
    <!--Ajandek-->
    <div class="progress vertical progress-gift ver-prof">
        <p class="p-percent d-flex justify-content-center p-2" data-toggle="tooltip" 
            title=" <?php echo number_format($expendPercent[3], 2) . "%" ?>">
            <?php echo number_format($expendPercent[3]) . "%" ?>
        </p>
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
            style="background-color:  #ea7070; width: <?php echo number_format($expendPercent[3]) ?>%;">
        </div>
    </div>
    <!--Egészség-->
    <div class="progress vertical progress-health ver-prof">
        <p class="p-percent d-flex justify-content-center p-2" data-toggle="tooltip" 
            title=" <?php echo number_format($expendPercent[4], 2) . "%" ?>">
            <?php echo number_format($expendPercent[4]) . "%" ?>
        </p>
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
            style="background-color: #77e70d; width: <?php echo number_format($expendPercent[4]) ?>%;">
        </div>
    </div>
    <!--Csalad-->
    <div class="progress vertical progress-family ver-prof">
        <p class="p-percent d-flex justify-content-center p-2" data-toggle="tooltip" 
            title=" <?php echo number_format($expendPercent[5], 2) . "%" ?>">
            <?php echo number_format($expendPercent[5]) . "%" ?>
        </p>
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
            style="background-color: mediumpurple; width: <?php echo number_format($expendPercent[5]) ?>%;">
        </div>
    </div>
    <!--Sport-->
    <div class="progress vertical progress-sport ver-prof">
        <p class="p-percent d-flex justify-content-center p-2" data-toggle="tooltip" 
            title=" <?php echo number_format($expendPercent[6], 2) . "%" ?>">
            <?php echo number_format($expendPercent[6]) . "%" ?>
        </p>
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
            style="background-color: brown; width: <?php echo number_format($expendPercent[6]) ?>%;">
        </div>
    </div>
</div>