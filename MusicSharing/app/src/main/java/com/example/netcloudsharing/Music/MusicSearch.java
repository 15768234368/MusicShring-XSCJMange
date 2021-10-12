package com.example.netcloudsharing.Music;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ListView;
import android.widget.SearchView;

import androidx.appcompat.app.AppCompatActivity;

import com.example.netcloudsharing.R;

public class MusicSearch extends AppCompatActivity {

    private String[] mStrings = new String[]{"http://data.flash127.com/mp3_flash127_com/mp3/201806/20180601_1854_774058.mp3", "http://data.flash127.com/mp3_flash127_com/mp3/201802/20180205_1546_724406.mp3"
            , "http://k6.kekenet.com/Sound/2019/08/m200016581_1484302841_1444410KGM.mp3", "http://data.flash127.com/mp3_flash127_com/mp3/201605/1462090742.mp3"};
    String path;
    private ListView listView;
    private SearchView searchView;
    private EditText etURL;
    private ImageButton ibBack;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.music_search);
        init();
    }

    private void init() {
        etURL = findViewById(R.id.activity_music_search_etURL);
        ibBack = findViewById(R.id.fragment_music_ibBackToMusicHome);
        ibBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
        listView = findViewById(R.id.listview);
        listView.setAdapter(new ArrayAdapter(this, android.R.layout.simple_list_item_1, mStrings));
        //设置ListView启用过滤
//        listView.setTextFilterEnabled(true);
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                etURL.setText(mStrings[position]);
            }
        });
        searchView = findViewById(R.id.searchview);
        //设置该SearchView默认是否自动缩小为图标
        searchView.setIconifiedByDefault(false);
        //设置该SearchView显示搜索按钮
        searchView.setSubmitButtonEnabled(true);
        searchView.setQueryHint("查找");
        //为该SearchView组件设置事件监听器
        searchView.setOnQueryTextListener(new SearchView.OnQueryTextListener() {
            //单机搜索按钮时激发该方法
            @Override
            public boolean onQueryTextSubmit(String query) {
                //实际应用中应该在该方法内执行实际查询，此处仅使用Toast显示用户输入的查询内容
                path = String.valueOf(searchView.getQuery());
                Intent intent = new Intent(MusicSearch.this,HttpGetDemoActivity.class);
                intent.putExtra("path",path);
                startActivity(intent);
                return false;
            }

            //用户输入字符时激发该方法
            @Override
            public boolean onQueryTextChange(String newText) {
//                tvSearchView.setText(searchView.getQuery());
                //如果newText不是长度为0的字符串
                if (TextUtils.isEmpty(newText)) {
                    //清除ListView的过滤
                    listView.clearTextFilter();
                } else {
                    //使用用户输入的内容对ListView的列表项进行过滤
                    listView.setFilterText(newText);
                }
                return true;
            }
        });
    }
}