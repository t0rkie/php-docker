<?php
function current_page($page_name) {
  $current_page = $_GET['page'] ?? 'home';
  // セキュリティ対策：ページ名に不正な文字が含まれないか確認
  $current_page = htmlspecialchars($current_page, ENT_QUOTES, 'UTF-8');
  
  return strpos($current_page, $page_name) !== false ? 'active' : '';
}

$username = $_SESSION['username'];
?>

<aside class="sidebar">
  <div class="sidebar-header">
    <img src="images/logo.png" alt="logo" />
    <h2>StudyTrack</h2>
  </div>
  <ul class="sidebar-links">
    <h4>
      <span>Main Menu</span>
      <div class="menu-separator"></div>
    </h4>
    <li>
      <a href="/timer" class="<?= current_page('timer'); ?>">
        タイマー
      </a>
    </li>
    <li>
      <a href="/list" class="<?= current_page('list'); ?>">
        一覧
      </a>
    </li>
  </ul>

  <div>
    <?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>
  </div>
</aside>

<style>
.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  /* width: 85px; */
  width: 260px;
  display: flex;
  overflow-x: hidden;
  flex-direction: column;
  background: #161a2d;
  padding: 25px 20px;
  /* transition: all 0.4s ease; */
}
.sidebar:hover {
  /* width: 260px; */
}
.sidebar .sidebar-header {
  display: flex;
  align-items: center;
}
.sidebar .sidebar-header img {
  width: 42px;
  border-radius: 50%;
}
.sidebar .sidebar-header h2 {
  color: #fff;
  font-size: 1.25rem;
  font-weight: 600;
  white-space: nowrap;
  margin-left: 23px;
}
.sidebar-links h4 {
  color: #fff;
  font-weight: 500;
  white-space: nowrap;
  margin: 10px 0;
  position: relative;
}
.sidebar-links h4 span {
  opacity: 0;
}
.sidebar-links {
  list-style: none;
  margin-top: 20px;
  height: 80%;
  overflow-y: auto;
  scrollbar-width: none;
}
.sidebar-links::-webkit-scrollbar {
  display: none;
}
.sidebar-links li a {
  display: flex;
  align-items: center;
  gap: 0 20px;
  color: #fff;
  font-weight: 500;
  white-space: nowrap;
  padding: 15px 10px;
  text-decoration: none;
  transition: 0.2s ease;
}
/* .sidebar-links li a:hover {
  color: #161a2d;
  background: #fff;
  border-radius: 4px;
} */
.sidebar-links li .active {
  color: #161a2d;
  background: #fff;
  border-radius: 4px;
}


</style>