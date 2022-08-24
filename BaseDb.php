<?php

class BaseDb
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=127.0.0.1;dbname=computer", "root","");
    }

    public function processor(): void
    {
        $statement = $this->db->prepare("SELECT netname, motherboard, vendor, guarantee FROM computers inner join processors on FID_Processor = ID_Pocessor WHERE processors.name=?");
        $statement->execute([$_POST["processor"]]);
        echo "<table>";
        echo " <tr>
         <th> Ім'я мережі | </th>
         <th> Материнська плата | </th>
         <th> Виробник | </th>
         <th> Гарантія </th>
        </tr> ";
        while ($data = $statement->fetch()) {
            echo " <tr>
             <th> {$data['netname']}  </th>
             <th> {$data['motherboard']} </th>
             <th> {$data['vendor']} </th>
             <th> {$data['guarantee']} </th>
            </tr> ";
        }
        echo "</table>";

    }

    public function software(): void
    {
        $statement = $this->db->prepare("SELECT netname, motherboard, vendor, guarantee FROM computers inner join computer_softwares on ID_Computer = FID_Computer inner join softwares on FID_Software = ID_Software WHERE softwares.name=?");
        $statement->execute([$_POST["software"]]);
        echo "<table>";
        echo " <tr>
         <th> Ім'я мережі | </th>
         <th> Материнська плата | </th>
         <th> Виробник | </th>
         <th> Гарантія  </th>
        </tr> ";
        while ($data = $statement->fetch()) {
            echo " <tr>
             <th> {$data['netname']}  </th>
             <th> {$data['motherboard']} </th>
             <th> {$data['vendor']} </th>
             <th> {$data['guarantee']} </th>
            </tr> ";
        }
        echo "</table>";

    }

    public function guarantee(): void
    {
        $statement = $this->db->prepare("SELECT netname, motherboard, vendor, guarantee FROM computers WHERE guarantee < ?");
        $statement->execute([date("Y-m-d")]);
        echo "<table>";
        echo " <tr>
         <th> Ім'я мережі | </th>
         <th> Материнська плата | </th>
         <th> Виробник | </th>
         <th> Гарантія  </th>
        </tr> ";
        while ($data = $statement->fetch()) {
            echo " <tr>
             <th> {$data['netname']}  </th>
             <th> {$data['motherboard']} </th>
             <th> {$data['vendor']} </th>
             <th> {$data['guarantee']} </th>
            </tr> ";
        }
        echo "</table>";
    }


}