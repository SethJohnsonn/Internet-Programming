<?php
  session_start();

  if($_SESSION['username'] == "")
  {
          header("Location: index.php?error=2");
  }

date_default_timezone_set('America/New_York');
$datetime = date('m/d/Y h:i:s a');
$ticker = $_GET['ticker'];
$shares = $_GET['shares'];
$total;

	if (isset($_GET['add'])) {
		     addStock($ticker, $shares, $total);
	}
  elseif (isset($_GET['mod'])) {
        modifyStock($ticker, $shares);
  }
	elseif (isset($_GET['del'])) {
		deleteStock($ticker);
	}
  else{
    header("Location: client.php?error=1&display=1");
  }


  function addStock($tick, $stockNum, $totalValue) {
		$datetime = date('m/d/Y h:i:s a');

		if ($stockNum < "1") {
			header("Location: stock.php?error=1&display=1");
			die();
		}

		$csvFile = file("http://finance.yahoo.com/d/quotes.csv?s=$tick&f=sl1d1t1c1ohgv&e=.csv");
		$data = [];
		foreach ($csvFile as $line) {
			$data = str_getcsv($line);
		}
		implode(",",$data);
		if ($data[1] !== "N/A") {
			$value = round(($data[1] * $stockNum), 2);
			$fp = fopen("userdata.dat", "a");
			fwrite($fp, "Ticker: $data[0] | Price: $data[1] | # of Shares: $stockNum | Value:  $value | Entered on: $datetime\n");
			fclose($fp);
		} else {
			header("Location: stock.php?error=1&display=1");
		}
	}

  function modifyStock($ticker, $stockNum) {
  $datetime = date('m/d/Y h:i:s a');

  if ($stockNum < "1") {
    header("Location: client.php?error=1&display=1");
    die("You need at least 1 share!");
  }
  $csvFile = file("http://finance.yahoo.com/d/quotes.csv?s=$ticker&f=sl1d1t1c1ohgv&e=.csv");
  $stock = [];
  foreach ($csvFile as $line) {
    $stock = str_getcsv($line);
  }
  implode(",",$stock);
  $value = round(($stock[1] * $stockNum), 2);
  $fc = file("userdata.dat");
  $fp = fopen("userdata.dat", "w");
  foreach($fc as $line) {
    if (!strstr($line, $ticker))
      fputs($fp, $line);
    else
      fwrite($fp, "Ticker: $stock[0] | Price: $stock[1] | # of Shares: $stockNum | Value:  $value | Entered on: $datetime\n");
    }
  fclose($fp);
}

function deleteStock($ticker) {
  $fc = file("userdata.dat");
  $fp = fopen("userdata.dat", "w");
  foreach($fc as $line) {
    if (!strstr($line, $ticker))
      fputs($fp, $line);
  }
  fclose($fp);
}
header("Location: client.php?display=1");
?>
