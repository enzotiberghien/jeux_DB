<?php

function get_all_games($bdd){
    $query = "SELECT * FROM games";
    $stmt = $bdd->query($query);
    $tableau = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $tableau;
}

function insert_games($bdd, $tab){
    $query = "INSERT INTO games(name, category, price, picture)
    VALUES (:name, :category, :price, :picture)";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':name', $tab['name'], PDO::PARAM_STR);
    $stmt->bindValue(':category', $tab['category'], PDO::PARAM_STR);
    $stmt->bindValue(':price', $tab['price'], PDO::PARAM_STR);
    $stmt->bindValue(':picture', $tab['picture'], PDO::PARAM_STR);
    $stmt->execute();
}

function get_game_by_id($bdd, $id){
    $query = "SELECT * FROM games
    WHERE id = ?";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(1, $id, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_games_by_name($bdd, $name){
    $query = "SELECT * FROM games
    WHERE name = ?";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(1, $name, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function delete_game_by_id($bdd, $id){
    $query = "DELETE FROM games 
    WHERE id = ?";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(1, $id, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}