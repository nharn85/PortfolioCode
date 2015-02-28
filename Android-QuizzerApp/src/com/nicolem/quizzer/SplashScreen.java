package com.nicolem.quizzer;


import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import android.support.v7.app.ActionBarActivity;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.Gravity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;


public class SplashScreen extends ActionBarActivity {
	Button btnStart;
	EditText nameEditText;
	Bundle extras;
	
	int count = 0;//used to give index within while for hashmap
	String term = "";
	String def = "";
	ArrayList<String> terms = new ArrayList<String>();
	ArrayList<String> defs = new ArrayList<String>();
	Map<String, String> map = new HashMap<String, String>();
	public static final String TAG = "QuizScreen";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.splash_screen);
        
        btnStart = (Button)findViewById(R.id.btnStart);
        nameEditText = (EditText)findViewById(R.id.nameEditText);
        
        InputStream is = this.getResources().openRawResource(R.raw.quiz4);
        BufferedReader br = new BufferedReader(new InputStreamReader(is));
        String str = null;
        
        try{
        	while((str = br.readLine())!=null)
        	{
        		String[] line = str.split("~");
        		term = line[0];
        		terms.add(term);
        		def = line[1];
        		defs.add(def);
                map.put(terms.get(count), defs.get(count));
                count++;
        	}
        }catch(IOException e)
	        {
	        	e.printStackTrace();
	        	Log.e(TAG, "You broke it!");
	        }

        btnStart.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				String name = nameEditText.getText().toString();
				
				if(ifValid(name) == true){
					//intent to nav to quiz screen
					
					Intent i = new Intent(SplashScreen.this,QuizScreen.class);//create intent object
	        		extras = new Bundle();//create bundle object
	        		extras.putString("namekey", name);//fill bundle - sending name value
	        		extras.putStringArrayList("termkey", terms);
	        		extras.putStringArrayList("defkey", defs);
	        		extras.putSerializable("map", (Serializable) map);
	        		i.putExtras(extras);
	        		startActivity(i);
				} else {
					//if the name has numbers or other chars - send toast message
					int duration = Toast.LENGTH_SHORT;//set up the timing
					Context context = getApplicationContext();
					Toast toast = Toast.makeText(context, "Invalid name!\nUse only letters.", duration);//create Toast obj
					toast.setGravity(Gravity.CENTER_VERTICAL,0,0);
					toast.show();//call method of toast obj to display toast
				}
			}
		});//end btnStart
        
    }//end onCreate

    private static boolean ifValid(String txt) {

        String regx = "[a-zA-Z\\s]+";
        Pattern pattern = Pattern.compile(regx,Pattern.CASE_INSENSITIVE);
        Matcher matcher = pattern.matcher(txt);
        return matcher.matches(); //if whole line matches return true
       
    }//end ifValid
}//end SplashScreen
