package com.example.sampletagakauloliteracyandnumeracyapplication

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle

class StoryActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        supportActionBar?.hide()
        setContentView(R.layout.activity_story)
    }
}