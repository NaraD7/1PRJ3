<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: connexion.php");
    exit;
}

require_once 'config/database.php';

$section = isset($_GET['section']) ? $_GET['section'] : 'dashboard';

if (isset($_GET['action']) && isset($_GET['id']) && $section === 'agenda') {
    $statut = ($_GET['action'] === 'valider') ? 'confirmé' : 'annulé';
    $pdo->prepare("UPDATE reservation SET statut = ? WHERE id = ?")->execute([$statut, (int)$_GET['id']]);
    header("Location: admin_menu.php?section=agenda");
    exit;
}


if (isset($_POST['update_dispo'])) {
    $sql = "UPDATE disponibilite SET heure_debut_matin = ?, heure_fin_matin = ?, heure_debut_apresmidi = ?, heure_fin_apresmidi = ?, actif = ? WHERE id = ?";

    $hdm = !empty($_POST['hdm']) ? $_POST['hdm'] : null;
    $hfm = !empty($_POST['hfm']) ? $_POST['hfm'] : null;
    $hda = !empty($_POST['hda']) ? $_POST['hda'] : null;
    $hfa = !empty($_POST['hfa']) ? $_POST['hfa'] : null;
    $actif = isset($_POST['actif']) ? 1 : 0;
    $id = (int)$_POST['id'];

    $pdo->prepare($sql)->execute([$hdm, $hfm, $hda, $hfa, $actif, $id]);
    header("Location: admin_menu.php?section=dispos");
    exit;
}


if (isset($_POST['add_service'])) {
    $sql = "INSERT INTO service (nom, description, duree_minutes, prix_euros) VALUES (?, ?, ?, ?)";
    $pdo->prepare($sql)->execute([
            $_POST['nom'],
            $_POST['description'],
            $_POST['duree'],
            $_POST['prix']
    ]);
    header("Location: admin_menu.php?section=service");
    exit;
}

if (isset($_POST['update_service'])) {
    $sql = "UPDATE service SET nom=?, description=?, duree_minutes=?, prix_euros=? WHERE id=?";
    $pdo->prepare($sql)->execute([
            $_POST['nom'],
            $_POST['description'],
            (int)$_POST['duree'],
            (float)$_POST['prix'],
            (int)$_POST['id']
    ]);
    header("Location: admin_menu.php?section=service");
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'delete_service') {
    $pdo->prepare("DELETE FROM service WHERE id = ?")->execute([(int)$_GET['id']]);
    header("Location: admin_menu.php?section=service");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Salon</title>
    <link rel="stylesheet" href="public/css/admin_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<?php include 'includes/header-admin.php'; ?>


<main class="container">
    <?php if ($section === 'dashboard'): ?>
        <h2>Tableau de bord</h2>
        <div class="grid-menu">
            <a href="?section=agenda" class="card-menu"><h3>📅 Agenda</h3></a>
            <a href="?section=dispos" class="card-menu"><h3>🕒 Horaires</h3></a>
            <a href="?section=service" class="card-menu"><h3>📋 Services</h3></a>
        </div>

    <?php elseif ($section === 'agenda'): ?>
        <h2>📅 Réservations Clients</h2>
        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th>Nom Client</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Prestation</th>
                    <th>Date & Heure</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $resas = $pdo->query("SELECT r.*, s.nom AS nom_prestation FROM reservation r JOIN service s ON r.id_service = s.id ORDER BY r.date_rdv DESC, r.heure_rdv DESC")->fetchAll();

                foreach($resas as $r): ?>
                    <tr>
                        <td class="td-client"><strong><?= htmlspecialchars($r['nom_client']) ?></strong></td>
                        <td class="td-phone"><?= htmlspecialchars($r['telephone']) ?></td>
                        <td class="td-email"><a href="mailto:<?= htmlspecialchars($r['email_client']) ?>"><?= htmlspecialchars($r['email_client']) ?></a></td>

                        <td class="td-prestation"><strong><?= htmlspecialchars($r['nom_prestation']) ?></strong></td>
                        <td><?= date('d/m/Y', strtotime($r['date_rdv'])) ?> à <?= substr($r['heure_rdv'], 0, 5) ?></td>
                        <td><span class="badge <?= $r['statut'] ?>"><?= str_replace('_', ' ', $r['statut']) ?></span></td>

                        <td class="btn-group-agenda">
                            <a href="?section=agenda&action=valider&id=<?= $r['id'] ?>" class="btn-valider">Valider</a>
                            <a href="?section=agenda&action=annuler&id=<?= $r['id'] ?>" class="btn-annuler">Annuler</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php elseif ($section === 'dispos'): ?>
        <h2>🕒 Horaires & Disponibilités</h2>
        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th>Jour</th>
                    <th>Matin (Début - Fin)</th>
                    <th>Après-midi (Début - Fin)</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $horaires = $pdo->query("SELECT * FROM disponibilite ORDER BY id ASC")->fetchAll();
                foreach($horaires as $h):
                    $isEditing = (isset($_GET['edit']) && $_GET['edit'] == $h['id']);
                    ?>
                    <tr>
                        <?php if($isEditing): ?>
                            <form method="POST" action="admin_menu.php?section=dispos">
                                <input type="hidden" name="id" value="<?= $h['id'] ?>">
                                <td><strong><?= $h['jour_semaine'] ?></strong></td>
                                <td>
                                    <input type="time" name="hdm" value="<?= $h['heure_debut_matin'] ?>" class="edit-input-time">
                                    <input type="time" name="hfm" value="<?= $h['heure_fin_matin'] ?>" class="edit-input-time">
                                </td>
                                <td>
                                    <input type="time" name="hda" value="<?= $h['heure_debut_apresmidi'] ?>" class="edit-input-time">
                                    <input type="time" name="hfa" value="<?= $h['heure_fin_apresmidi'] ?>" class="edit-input-time">
                                </td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" name="actif" <?= $h['actif'] ? 'checked' : '' ?>> Ouvert
                                    </label>
                                </td>
                                <td class="btn-group">
                                    <button type="submit" name="update_dispo" class="btn-edit-ok">💾 OK</button>
                                    <a href="?section=dispos" class="btn-delete">❌</a>
                                </td>
                            </form>
                        <?php else: ?>
                            <td><strong><?= htmlspecialchars($h['jour_semaine']) ?></strong></td>
                            <td>
                                <?= $h['heure_debut_matin'] ? substr($h['heure_debut_matin'], 0, 5) . " - " . substr($h['heure_fin_matin'], 0, 5) : "Fermé" ?>
                            </td>
                            <td>
                                <?= $h['heure_debut_apresmidi'] ? substr($h['heure_debut_apresmidi'], 0, 5) . " - " . substr($h['heure_fin_apresmidi'], 0, 5) : "Fermé" ?>
                            </td>
                            <td>
                                <span class="badge <?= $h['actif'] ? 'confirmé' : 'annulé' ?>">
                                    <?= $h['actif'] ? 'Ouvert' : 'Fermé' ?>
                                </span>
                            </td>
                            <td>
                                <a href="?section=dispos&edit=<?= $h['id'] ?>" class="btn-edit">Modifier</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php elseif ($section === 'service'): ?>
        <h2>📋 Gestion des Services</h2>
        <form method="POST" action="admin_menu.php?section=service" class="form-add">
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" placeholder="Ex: Coupe" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" placeholder="Description..." required>
            </div>
            <div class="form-group form-group-small">
                <label>Durée</label>
                <input type="number" name="duree" placeholder="min" required>
            </div>
            <div class="form-group form-group-small">
                <label>Prix</label>
                <input type="number" step="0.01" name="prix" placeholder="€" required>
            </div>
            <button type="submit" name="add_service" class="btn-confirm">Ajouter</button>
        </form>

        <div class="table-container">
            <table>
                <thead><tr><th>Nom</th><th>Description</th><th>Durée</th><th>Prix</th><th>Actions</th></tr></thead>
                <tbody>
                <?php
                $services = $pdo->query("SELECT * FROM service")->fetchAll();
                foreach($services as $s):
                    $isEditing = (isset($_GET['edit']) && $_GET['edit'] == $s['id']);
                    ?>
                    <tr>
                        <?php if($isEditing): ?>
                            <form method="POST" action="admin_menu.php?section=service">
                                <input type="hidden" name="id" value="<?= $s['id'] ?>">
                                <td><input type="text" name="nom" class="edit-input" value="<?= htmlspecialchars($s['nom']) ?>" required></td>
                                <td><input type="text" name="description" class="edit-input" value="<?= htmlspecialchars($s['description']) ?>" required></td>
                                <td><input type="number" name="duree" class="edit-input" value="<?= $s['duree_minutes'] ?>" required></td>
                                <td><input type="number" step="0.01" name="prix" class="edit-input" value="<?= $s['prix_euros'] ?>" required></td>
                                <td class="btn-group">
                                    <button type="submit" name="update_service" class="btn-edit-ok">💾 OK</button>
                                    <a href="?section=service" class="btn-delete">❌</a>
                                </td>
                            </form>
                        <?php else: ?>
                            <td><strong><?= htmlspecialchars($s['nom']) ?></strong></td>
                            <td><?= htmlspecialchars($s['description']) ?></td>
                            <td><?= $s['duree_minutes'] ?> min</td>
                            <td><?= $s['prix_euros'] ?> €</td>
                            <td class="btn-group">
                                <a href="?section=service&edit=<?= $s['id'] ?>" class="btn-edit">Modifier</a>
                                <a href="?section=service&action=delete_service&id=<?= $s['id'] ?>" class="btn-delete" onclick="return confirm('Supprimer ?')">Supprimer</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</main>
</body>
</html>