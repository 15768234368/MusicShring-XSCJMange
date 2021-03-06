package com.example.netcloudsharing.Music;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.SeekBar;
import android.widget.SeekBar.OnSeekBarChangeListener;
import android.widget.TextView;

import com.example.netcloudsharing.R;

public class HttpGetDemoActivity extends Activity {
    /**
     * Called when the activity is first created.
     */
    private TextView tvPath = null;
    private Button download, delete, onlinPlay, stop = null;
    private SeekBar seekBar = null;
    private static final String TAG = "HttpGetDemoActivity";
    private MusicPlayer musicPlayer = null;
    private String pathtext = null;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_music_player);
        findView();
        pathtext = getIntent().getStringExtra("path");
//        downloader = new Downloader();
        musicPlayer = new MusicPlayer(seekBar);

    }

    private void findView() {
        tvPath = findViewById(R.id.tvPath);
        download = (Button) findViewById(R.id.btn_download);
        delete = (Button) findViewById(R.id.btn_delete);
        onlinPlay = (Button) findViewById(R.id.btn_play);
        stop = (Button) findViewById(R.id.btn_pause);
        seekBar = (SeekBar) findViewById(R.id.seekBar_playing);
        ButtonClickListener clickListener = new ButtonClickListener();
        SeekBarChangeEvent seekBarChangeEvent = new SeekBarChangeEvent();
        download.setOnClickListener(clickListener);
        delete.setOnClickListener(clickListener);
        onlinPlay.setOnClickListener(clickListener);
        stop.setOnClickListener(clickListener);
        seekBar.setOnSeekBarChangeListener(seekBarChangeEvent);
    }

    private final class ButtonClickListener implements OnClickListener {
        @Override
        public void onClick(View v) {
            // TODO Auto-generated method stub
            switch (v.getId()) {
                case R.id.btn_play:
                    new Thread(new Runnable() {
                        @Override
                        public void run() {
                            //???http://abv.cn/music/????????????.mp3????????? ????????????
                            musicPlayer.play(pathtext);
                        }
                    }).start();
                    break;
                case R.id.btn_pause:
                    //??????
                    musicPlayer.pause();
                    break;
                default:
                    break;
            }
        }
    }

    class SeekBarChangeEvent implements OnSeekBarChangeListener {
        int progress;

        @Override
        public void onProgressChanged(SeekBar seekBar, int progress,
                                      boolean fromUser) {
            /**
             * SeekBar?????????????????????   ?????????????????????????????????????????????
             * progress????????????
             * this.progress??????????????????????????????????????????
             */
            this.progress = progress * musicPlayer.mediaPlayer.getDuration() / seekBar.getMax();
        }

        @Override
        public void onStartTrackingTouch(SeekBar seekBar) {
            /**
             * ??????????????????
             */
        }

        @Override
        public void onStopTrackingTouch(SeekBar seekBar) {
            /**
             * ??????????????????
             * seekTo()?????????????????????????????????????????????????????????seekBar.getMax()???????????????
             */
            musicPlayer.mediaPlayer.seekTo(progress);
        }
    }

    @Override
    protected void onDestroy() {
        // TODO Auto-generated method stub
        super.onDestroy();
        musicPlayer.stop();
    }

}