package com.yusi.a014_uasga;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import java.util.HashMap;

public class tambahlapor extends AppCompatActivity {
    private EditText txtid;
    private EditText txtnama;
    private EditText txtlatitude;
    private EditText txtlongitude;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tambahlapor);

        txtid = (EditText) findViewById(R.id.id);
        txtnama = (EditText) findViewById(R.id.nama);
        txtlatitude = (EditText) findViewById(R.id.latitude);
        txtlongitude = (EditText) findViewById(R.id.longitude);

    }

    public void tambah_lapor(View view) {
        final String id = txtid.getText().toString().trim();
        final String nama = txtnama.getText().toString().trim();
        final String latitude = txtlatitude.getText().toString().trim();
        final String longitude = txtlongitude.getText().toString().trim();

        //SharedPrefences pref = getApplication().getSharedPrefences("akun", MODE_PRIVATE);
        //final String id_owner = pref.getString("username",null);

        class tambah_lapor2 extends AsyncTask<Void, Void, String> {
            ProgressDialog loading;
            @Override
            protected void onPreExecute(){
                super.onPreExecute();
                loading = ProgressDialog.show(tambahlapor.this,
                        "Add...","Wait...",false,false);
            }
            @Override
            protected String doInBackground(Void... v) {
                HashMap<String, String> params = new HashMap<>();
                params.put("id", id);
                params.put("nama", nama);
                params.put("latitude", latitude);
                params.put("longitude", longitude);
                RequestHandler rh = new RequestHandler();
                String res = rh.sendPostRequest("http://10.0.2.2/153_086_uasga/lapor.php", params);
                return res;
            }
            @Override
            protected void onPostExecute(String s){
                super.onPostExecute(s);
                loading.dismiss();
                //pindah ke menu utama
                if(s.equals("berhasil")){
                    Intent i = new Intent(tambahlapor.this, com.example.a153_086_uasga.MapsActivity.class);
                    startActivity(i);
                }else{
                    Toast.makeText(tambahlapor.this,
                            "DATA HARUS LENGKAP", Toast.LENGTH_SHORT).show();
                }
            }
        }
        tambah_lapor2 ae = new tambah_lapor2();
        ae.execute();
    }
}