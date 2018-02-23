<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" type="image/png" href="https://png.icons8.com/dusk/540/caps-lock-on.png">
		<style>

			h6 {
        		margin: 8.2% 0 0;
      		}

			h3 {
			    background: #5f5f5f;
			    margin: -8px 0px ;
			    width: 1354px;
			    height: 69px;
			    text-align: center;
			    border-radius: 10px 10px 10px 10px;
			    margin: 2px 0px 0px;
			}

			textarea {
				 overflow: auto;
				 resize: none;
				 width: 99.5%;
				 height: 200px;
				 background: #f6f6f6;
				 border: 1px solid #cecece;
				 border-radius: 0px 0px 5px 5px;
				 padding: 0px 0 8px 10px;
			     outline:none; 
			     margin: -8px 0px 0px;
			}

			html {
				 background: #d9d9d9;
			}

			textarea.second {
				  overflow: auto;
				  resize: none;
				  width: 99.5%;
				  height: 200px;
				  background: #f6f6f6;
				  border: 1px solid #cecece;
				  border-radius: 5px 5px 5px 5px;
				  padding: 0px 0 8px 10px;
				  outline:none; 
				  margin: 5px 0px 0px;
				}

			input {
			    font-weight: 200;
			    color: white;
			    text-decoration: none;
			    padding: .8em 3em calc(.8em + 3px);
			    border-radius: 3px;
			    background: rgb(64,199,129);
			    box-shadow: 0 -3px rgb(53,167,110) inset;
			    transition: 0.2s;
			    border-radius: 5px;
			    outline:none; 
			} 
			input:hover { 
			    background: rgb(53, 167, 110); 
			}
			input:active {
			    background: rgb(33,147,90);
			    box-shadow: 0 3px rgb(33,147,90) inset;
			}


		</style>

		<h3><font color = "white" size = "4" face = "serif" align = "center"> </br>Enter your text here: </font></h3>
		<!-- <link rel="stylesheet" href="styles/style_decapser.css"> -->
		<meta charset="utf-8">
		<title>Decapser</title>
		<!-- <link rel="image_src" href="http://moziru.com/images/keyboard-clipart-caps-lock-key-8.png"> -->
	</head>
	<body >
		<form action = "" method = "POST" name="form1">
			<textarea rows="25" cols="167" placeholder = "Your text" name = "text"></textarea>
			<input type = 'submit' value = "Send" color = "#5f5f5f"> </br>
		</form>
	

<?php

$text = $_REQUEST['text'];
?>


	
		<form name="form2">
			<textarea readonly class = "second" name = "Your text"> <?php jcaps($text) ?></textarea>

		</form>
	<footer>
			<h6><font color="#898E8C"> Last chenge: </html><?php
				$file = "decapser_full.php";
				$date = date("d F Y H:i:s", filectime($file));
				echo $date;
			?> <html></font></h6>
		</footer>
	</body>
</html>

<?php
function jcaps ($str) {
  mb_internal_encoding("UTF-8");
    $stroka = (string)"$str";
    $count = '0'; //помогает найти пробел после конца предложения 
    $sentances = array(array()); //массив, содержащий предложения (что бы каждое первое слово массива начать с большой буквы)
    $key = 0; //переменная для разбиения предложений на массивы и их идентификации (увеличивается после нахождения конца предложения)
    $arr_stroka =  str_split($stroka); //массив с каждым символом текста в отдельной ячейке


    foreach ($arr_stroka as $stroka_elem) { //перебирает каждую букву предложения

      if ($stroka_elem == " " and $count == '0') { //ищет пробелы, стоящие в начале предложения 
        $stroka_elem = ''; //удаляет пробел в начале предложения
      }

      if ($stroka_elem != '.' and $stroka_elem != '?' and $stroka_elem != '!') { //точка, ?, ! - триггеры для перехода на следующий массив (предложение)
        $sentances[$key][0] = $sentances[$key][0] . $stroka_elem; //добавляет букву в активный сейчас массив
        $count++;
      } else {
        $sentances[$key][0] = $sentances[$key][0] . $stroka_elem; //добавляет точку в тот- же массив, что и прошлые буквы...
        $key++; // ...и переключает на следующий массив- предложение
        $count = '0'; //count = 0, значит самое начало нового предложения

      }

    }

function mb_ucfirst($text) {
    return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
}

    $text = '';
    foreach ($sentances as $sentance) {
      $imploded_sentance = implode("", $sentance); //соединяет массивы- предложения в строки
      $imploded_sentance = mb_ucfirst(mb_strtolower($imploded_sentance)); //конвертирует ВЕРХНИЙ РЕГИСТР в нижний, а потом ставит заглавные буквы
      $text = $text. " " . $imploded_sentance; //соединяет полученные слова в текст
    }
    $length = strlen($text);
    echo substr($text, 1, $length);
    
}


?>
