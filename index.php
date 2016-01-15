<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_GET['board'])) {
            $position = $_GET['board'];
        } else {
            $position = "---------";
        }
        
        class Game {
            var $position;
            var $newposition;
            function __construct($squares) {
                $this->position = str_split($squares);
            }
            
            function winner($token) {
                $won = false;
                if(($this->position[0] == $token) &&
                   ($this->position[1] == $token) &&
                   ($this->position[2] == $token)) {
                    $won = true;
                } else if (($this->position[3] == $token) &&
                           ($this->position[4] == $token) &&
                           ($this->position[5] == $token)) {
                    $won = true;
                } else if (($this->position[6] == $token) &&
                           ($this->position[7] == $token) &&
                           ($this->position[8] == $token)) {
                    $won = true;
                } else if (($this->position[0] == $token) &&
                           ($this->position[3] == $token) &&
                           ($this->position[6] == $token)) {
                    $won = true;
                } else if (($this->position[1] == $token) &&
                           ($this->position[4] == $token) &&
                           ($this->position[7] == $token)) {
                    $won = true;
                } else if (($this->position[2] == $token) &&
                           ($this->position[5] == $token) &&
                           ($this->position[8] == $token)) {
                    $won = true;
                } else if (($this->position[0] == $token) &&
                           ($this->position[4] == $token) &&
                           ($this->position[8] == $token)) {
                    $won = true;
                } else if (($this->position[2] == $token) &&
                           ($this->position[4] == $token) &&
                           ($this->position[6] == $token)) {
                    $won = true;
                }
                return $won;
            }
            
            function display() {
                echo '<table cols="3" style="font-size:large; font-weight:bold">';
                echo '<tr>';
                for ($pos = 0; $pos < 9; $pos++) {
                    echo $this->show_cell($pos);
                    //echo '<td>-</td>';
                    if ($pos % 3 == 2) {
                        echo '</tr><tr>';
                    }
                }
                echo '</tr>';
                echo '</table>';
            }
            
            function show_cell($which) {
                $token = $this->position[$which];
                if ($token <> '-') {
                    return '<td>' . $token . '</td>';
                }
                $this->newposition = $this->position;
                $this->newposition[$which] = 'x';
                for ($pos = 0; $pos < 9; $pos++) {
                    if ($this->newposition[$pos] == '-') {
                        $this->newposition[$pos] = 'o';
                        break;
                    }
                }
                $move = implode($this->newposition);
                $link = 'index.php/?board=' . $move;
                return '<td><a href="' . $link . '">-</a></td>';
            }
        }
        
        $game = new Game($position);
        $game->display();
        if ($game->winner('x')) {
            echo 'You win. Lucky guesses!';
        } else if ($game->winner('o')) {
            echo 'I win. Muahahahaha';
        } else {
            echo 'No winner yet, but you are losing.';
        }
        ?>
    </body>
</html>


