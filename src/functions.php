<?php
function isSlotAvailable($pdo, $date, $heure_debut, $id_service) {
    $stmt = $pdo->prepare("SELECT duree_minutes FROM service WHERE id = ?");
    $stmt->execute([$id_service]);
    $service = $stmt->fetch();

    if (!$service) return false;
    $duree = $service['duree_minutes'];

    $heure_fin = date('H:i:s', strtotime("+$duree minutes", strtotime($heure_debut)));

    $sql = "SELECT r.*, s.duree_minutes 
            FROM reservation r 
            JOIN service s ON r.id_service = s.id 
            WHERE r.date_rdv = :date 
            AND r.statut != 'annule'
            AND :heure_debut < ADDTIME(r.heure_rdv, SEC_TO_TIME(s.duree_minutes * 60))
            AND :heure_fin > r.heure_rdv";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':date' => $date,
        ':heure_debut' => $heure_debut,
        ':heure_fin' => $heure_fin
    ]);

    return $stmt->rowCount() === 0;
}