<div class="corps">
    <form method="GET" action="search.php">
        <div style="display:flex; align-items: center;">
            <div class="flex-1">
                <label for="rech">Rechercher par :</label>
                <input type="text" name="rech" placeholder="Titre, contenu, ou auteur de l'article">
            </div>
            <div class="flex-1">
                <label for="cat">Categorie :</label>
                <select name="cat">
                    <option selected="selected" value="">-- Choisir une catégorie --</option>
                    <option value="1">API</option>
                    <option value="2">Performance</option>
                    <option value="3">IDE</option>
                    <option value="4">VS Code</option>
                </select>
            </div>
            <div class="flex-2">
                <br>
                <input type="submit" name="search" value="Rechercher">
            </div>
        </div>
    </form>
</div>
<div class="corps">
    <form method="GET" action="filter.php">
        <div style="display:flex; align-items: center;">
            <div class="flex-1">
                <label for="author">Filtrer par :</label>
                <input type="text" name="author" placeholder="Auteur">
            </div>
            <div class="flex-1">
                <label for="cat">Categorie :</label>
                <select name="cat">
                    <option selected="selected" value="">-- Choisir une catégorie --</option>
                    <option value="1">API</option>
                    <option value="2">Performance</option>
                    <option value="3">IDE</option>
                    <option value="4">VS Code</option>
                </select>
            </div>
            <div class="flex-2">
                <br>
                <input type="submit" name="filter" value="Filtrer">
            </div>
        </div>
    </form>
</div>