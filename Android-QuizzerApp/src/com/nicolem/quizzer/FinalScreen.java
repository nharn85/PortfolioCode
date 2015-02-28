package com.nicolem.quizzer;

import android.support.v7.app.ActionBarActivity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class FinalScreen extends ActionBarActivity {
	TextView tvScore;
	TextView tvName;
	Button btnAgain;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_final_screen);
		
		tvScore = (TextView) findViewById(R.id.tvScore);
		tvName = (TextView) findViewById(R.id.tvName);
		btnAgain = (Button) findViewById(R.id.btnAgain);
		
		String name= "";
		int score = 0;
		int outOf = 0;//this will come from the QuizScreen as defs.size()
		Bundle extras=getIntent().getExtras();
		if(extras != null)//if bundle has content
		{
			name = extras.getString("namekey");
			score = extras.getInt("scorekey");
			outOf = extras.getInt("outOfKey");
		}

		//displays name and score
		tvName.setText(name);
		tvScore.setText(score+"/"+outOf);
		
		//will restart from splash screen
		btnAgain.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				Intent i = new Intent(FinalScreen.this,SplashScreen.class);//create intent object
				startActivity(i);
			}
		});
	}//end onCreate
	
	@Override
	public void onBackPressed(){
		Intent i = new Intent(FinalScreen.this,SplashScreen.class);//create intent object
		startActivity(i);
	}//end onBackPressed
}//end FinalScreen
