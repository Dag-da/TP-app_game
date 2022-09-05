<label for="<?= $game["id"] ?>" class="btn modal-button">Supprimer</label>

<input type="checkbox" id="<?= $game["id"] ?>" class="modal-toggle" />
<div class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg text-center">Voulez vous vraiment supprimer ce jeu ?</h3>
        <div class="flex justify-center space-x-5 pt-5">
            <div class="modal-action">
                <label for="<?= $game["id"] ?>" class="btn">Non</label>
            </div>
            <div class="modal-action">
                <label for="<?= $game["id"] ?>" class="btn btn-primary">    
                    <a href="delete.php?id=<?= $game["id"] ?>&name=<?= $game["name"] ?>">Oui</a>
                </label>
            </div>
        </div>
    </div>
</div>