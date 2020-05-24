<?php
class Pertandingan_model extends CI_model
{

    public function getAllPertandingan()
    {
        return $this->db->get('pertandingan')->result_array();
    }

    public function insertPertandingan($bagian)
    {
        //GENERATE ID
        $idUser = $this->session->userdata('id_user');
        $idTurnament = $this->session->userdata('idTurnament');
        $ctr = 1;
        $query = $this->db->query("select * from pertandingan");
        $newId = $bagian;
        $cekNewId = 'B' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_match']), 0, 2);
            if ($cekId == $cekNewId) {
                $ctr++;
            }
        }

        if ($ctr < 10) {
            $generateId = $cekNewId . '000' . $ctr;
        } else if ($ctr < 100) {
            $generateId = $cekNewId . '00' . $ctr;
        } else if ($ctr < 1000) {
            $generateId = $cekNewId . '0' . $ctr;
        } else {
            $generateId = $cekNewId . $ctr;
        }



        // $tgl = date("Y-m-d H:i:s");
        $data = [
            "id_match" => $generateId,
            "id_turnament" => $idTurnament,
            "waktu_mulai" => '',
            "bagian" => $bagian,
            "status" =>  0,
            "skor_1" =>  '',
            "skor_2" =>  '',
            "team_1" =>  '',
            "team_2" =>  ''
        ];
        $this->db->insert('pertandingan', $data);
    }


    public function editPertandingan($id)
    {
        $data = [
            "bagian" => $this->input->post(''),
            "skor_1" =>  $this->input->post(''),
            "skor_2" =>  $this->input->post(''),
            "team_1" =>  $this->input->post(''),
            "team_2" =>  $this->input->post('')
        ];
        $this->db->where('id_match', $id);
        $this->db->update('pertandingan', $data);
    }

    public function deletePertandingan($id)
    {
        $this->db->where('id_match', $id);
        $this->db->delete('pertandingan');
    }

    public function joinPertandingan()
    {


        $idTurnament = $this->input->post('id_turnament');
        $idTeam = $this->input->post('id_team');
        $slot =  $this->input->post('jumlah_slot');



        $join = false;
        $query = $this->db->query("select * from pertandingan");
        foreach ($query->result_array() as $row) {
            if ($row['id_turnament'] == $idTurnament) {
                if ($row['team_1'] == $idTeam || $row['team_2'] == $idTeam) {
                    $join = true;
                }
            }
        }

        if (!$join) {
            $randomBagian = array();
            if ($slot == 2) {
                array_push($randomBagian, "finalteam1");
                array_push($randomBagian, "finalteam2");
            } else {
                $ctr = $slot / 4;
                for ($i = 1; $i <= $ctr; $i++) {
                    for ($j = 1; $j <= 2; $j++) {
                        if ($slot == 4) {
                            array_push($randomBagian, "semifinalkiriteam" . $j);
                            array_push($randomBagian, "semifinalkananteam" . $j);
                        } else if ($slot == 8) {
                            array_push($randomBagian, "quarterfinalkiri" . $i . "team" . $j);
                            array_push($randomBagian, "quarterfinalkanan" . $i . "team" . $j);
                        } else if ($slot == 16 || $slot == 32) {
                            array_push($randomBagian, "round1kiri" . $i . "team" . $j);
                            array_push($randomBagian, "round1kanan" . $i . "team" . $j);
                        }
                    }
                }
            }



            $query = $this->db->query("select * from pertandingan");
            foreach ($query->result_array() as $row) {
                if ($row['id_turnament'] == $idTurnament) {
                    for ($i = 0; $i < $slot; $i++) {

                        if ($randomBagian[$i] == $row['bagian'] . "team1") {
                            if ($row['team_1'] != "") {
                                $randomBagian[$i] = "";
                            }
                        }

                        if ($randomBagian[$i] == $row['bagian'] . "team2") {
                            if ($row['team_2'] != "") {
                                $randomBagian[$i] = "";
                            }
                        }
                    }
                }
            }

            $ada = false;
            $bagian = "";
            while ($ada == false) {
                $rand = rand(0, $slot - 1);
                if ($randomBagian[$rand] != "") {
                    $bagian = $randomBagian[$rand];
                    $ada = true;
                }
            }

            $tim = substr($bagian, -5);
            $idx = strpos($bagian, "team");
            $bagian2 = substr($bagian, 0, $idx);

            if ($tim == "team1") {
                echo "masuk1";
                echo  $bagian2;
                $query = "update pertandingan set team_1 = '" . $idTeam . "' where bagian = '" . $bagian2 . "' and id_turnament='" . $idTurnament . "' ";
                $this->db->query($query);
            } else if ($tim == "team2") {
                echo "masuk2";
                echo $bagian2;
                $query = "update pertandingan set team_2 = '" . $idTeam . "' where bagian = '" . $bagian2 . "' and id_turnament='" . $idTurnament . "' ";
                $this->db->query($query);
            }

            //TAMBAH JUMLAH PEMAIN
            $query = $this->db->query("select * from tournament");
            foreach ($query->result_array() as $row) {
                if ($row['id_turnament'] == $idTurnament) {
                    $jml = $row['jumlah_pemain'];
                }
            }
            $jml += 1;
            $data = [
                "jumlah_pemain" => $jml
            ];

            $this->db->where('id_turnament', $idTurnament);
            $this->db->update('tournament', $data);


            //UPDATE STATUS FULL (1)
            $query = $this->db->query("select * from tournament");
            foreach ($query->result_array() as $row) {
                if ($row['jumlah_pemain'] == $row['jumlah_slot']) {
                    $data = [
                        "status" => 1
                    ];

                    $this->db->where('id_turnament', $idTurnament);
                    $this->db->update('tournament', $data);
                }
            }


            redirect('Community/refreshTournament');
        } else {
            echo "joined";
        }
    }

    public function addTeam($idMatch, $idTeam, $team)
    {
        if ($team == 1) {
            $data = [
                "team_1" =>  $idTeam
            ];
        } else {
            $data = [
                "team_2" =>  $idTeam
            ];
        }

        $this->db->where('id_match', $idMatch);
        $this->db->update('pertandingan', $data);

        $query = $this->db->query("select * from pertandingan");
        foreach ($query->result_array() as $row) {
            if ($row['id_match'] == $idMatch) {
                if ($row['team_1'] != "" && $row['team_2'] != "") {
                    $data = [
                        "status" =>  1
                    ];

                    $this->db->where('id_match', $idMatch);
                    $this->db->update('pertandingan', $data);
                }
            }
        }
    }

    public function updateSkor()
    {
        //0 = belum selesai
        //1 = tim1 menang
        //2 = tim2 menang

        $idMatch = $this->input->post('idMatch');

        $data = [
            "skor_1" => $this->input->post('skor1'),
            "skor_2" => $this->input->post('skor2'),
            "status" => $this->input->post('status')
        ];

        $this->db->where('id_match', $idMatch);
        $this->db->update('pertandingan', $data);
    }

    public function updateTeamPertandingan()
    {
        $idTurney = $this->input->post("id_turnament");
        $bagian = $this->input->post('bagian');
        $side = $this->input->post('side');
        if ($side == "team1") {
            $data = [
                "team_1" => $this->input->post('nama_team')
            ];
        } else {
            $data = [
                "team_2" => $this->input->post('nama_team')
            ];
        }

        echo $bagian;


        $this->db->where('bagian', $bagian);
        $this->db->where('id_turnament', $idTurney);
        $this->db->update('pertandingan', $data);
    }
}
