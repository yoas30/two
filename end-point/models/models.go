package models

type Aktivitas struct {
	ID         		int       `json:"id"`
	OperatorID 		string    `json:"operator_id"`
	NamaAlat  		string    `json:"nama_alat"`
	Lokasi  		string    `json:"lokasi"`
	Aktivitas 		string    `json:"aktivitas"`
	JamMulai  		string    `json:"jam_mulai"`
	JamSelesai 		string    `json:"jam_selesai"`
	Status     		string    `json:"status"`
	CreatedAt 		string    `json:"created_at"`
}

type Operators struct {
	ID         		int       `json:"id"`
	Nama       		string    `json:"nama"`
	OperatorID 		string    `json:"operator_id"`
	Jabatan  		string    `json:"jabatan"`
	CreatedAt 		string    `json:"created_at"`
}

