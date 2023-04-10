#include <bits/stdc++.h>
#define fore(i, l, r) for (long long i = (l); i < (r); i++)
#define forex(i, l, r) for (long long i = (l); i >= (r); i--)
#define ll long long
#define ull unsigned long long
#define nl cout<<"\n"
#define cnl "\n"
#define rfc "\033[31;1m"
#define gfc "\033[32;1m"
#define yfc "\033[33;1m"
#define bfc "\033[34;1m"
#define pfc "\033[35;1m"
#define cfc "\033[36;1m"
#define nfc "\033[0m"
#define pb push_back
using namespace std;

int main(){

    ios_base::sync_with_stdio(0);
    cin.tie(0);
    freopen("nuin.txt", "r", stdin);  //Elimina esta linea
    freopen("nuout.txt", "w", stdout);  //Elimina esta linea
    string s;
    while(cin>>s){
        cout<<"INSERT INTO NONUSABLE VALUES (\""<<s<<"\");"<<cnl;
    }

    cout<<"\n";
}