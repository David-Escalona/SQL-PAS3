<?php

        require("class.user.insert.php");
        require("class.pdofactory.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $objUser = new User($objPDO, 1);

        print "ID: " . $objUser->getID() . "<br />";
        print "First name is " . $objUser->getFirstName() . "<br />";
        print "Last name is " . $objUser->getLastName() . "<br />";
        print "Password is " . $objUser->getPassword() . "<br />";
        print "Mail is " . $objUser->getEmailAddress() . "<br />";
        print "Wrong is " . ($objUser->getWrong()?:"---") . "<br />";

        $objUser->setFirstName("Ed2");
        $objUser->Save();

        $objUser2 = new User($objPDO);

        $objUser2->setFirstName("Steve");
        $objUser2->setLastName("Nowicki");
        $objUser2->setDateAccountCreated(date("Y-m-d"));

        print "First name is " . $objUser2->getFirstName() . "<br />";
        print "Last name is " . $objUser2->getLastName() . "<br />";

        print "Saving...<br />";

        $objUser2->Save();

        print "ID in database is " . $objUser2->getID() . "<br />";
?>