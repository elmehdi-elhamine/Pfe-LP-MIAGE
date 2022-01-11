<?php

            session_start();


            if(!isset( $_SESSION['professeur']['time'] ) || (time() - $_SESSION['professeur']['time']) > 6000) {

                session_destroy();

                echo "-1";

            } else {

                echo "1";

            }

        ?>