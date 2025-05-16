<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('location:index.php');
    exit();
}

$username = $_SESSION['username'];

// Handle Post Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content'])) {
    $content = trim($_POST['content']);
    if (!empty($content)) {
        $stmt = $conn->prepare("INSERT INTO posts (username, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $content);
        $stmt->execute();
        $stmt->close();
    }
}

// Handle Post Deletion
if (isset($_GET['delete'])) {
    $postId = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ? AND username = ?");
    $stmt->bind_param("is", $postId, $username);
    $stmt->execute();
    $stmt->close();
}

// Fetch All Posts
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    




    <div class="container mt-4">
        <div class="jumbotron">
            <h1 class="display-4 text-center text-success">Welcome <?php echo htmlspecialchars($username); ?> </h1>
            <p class="lead">Share your thoughts or updates with the community!</p>
            <a class="btn btn-danger" href="logout.php">Logout</a>
        </div>


        


        <!-- Post Form -->
        <form method="POST" class="mb-4">
            <div class="form-group">
                <label for="content">Write a post</label>
                <textarea name="content" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Publish</button>
        </form>

        <!-- Post List -->
        <h3 class="mb-3">Posts</h3>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($row['username']); ?></h5>
                    <p class="card-text"><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
                    <small class="text-muted"><?php echo $row['created_at']; ?></small>
                    <?php if ($row['username'] === $username): ?>
                        <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger float-end" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>
