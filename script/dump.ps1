if((Get-ChildItem -File "D:\Utilisateurs\Jaouen\DataBase Save\FilmsSeries" | Measure-Object).Count -gt 11){
    try{
        Get-ChildItem "D:\Utilisateurs\Jaouen\DataBase Save\FilmsSeries" -Exclude *.log | Sort CreationTime | Select -First 1 | Remove-Item
        mysqldump -u root filmsSeries > "D:\Utilisateurs\Jaouen\DataBase Save\FilmsSeries\filmsSeries $(Get-Date -Format "dd-MM-yyyy_HH-mm-ss").sql"
    }
    Catch{
        $_.Exception | Out-File D:\Utilisateurs\Jaouen\DataBase Save\FilmsSeries\Error.log -Append
        Break
    }
}
else {
    try{
        mysqldump -u root filmsSeries > "D:\Utilisateurs\Jaouen\DataBase Save\FilmsSeries\filmsSeries $(Get-Date -Format "dd-MM-yyyy_HH-mm-ss").sql"
    }
    Catch{
        $_.Exception | Out-File -FilePath "D:\Utilisateurs\Jaouen\DataBase Save\FilmsSeries\Error.log" -Append
        Break
    }
}
Add-Type -AssemblyName System.Windows.Forms
$global:balmsg = New-Object System.Windows.Forms.NotifyIcon
$path = (Get-Process -id $pid).Path
$balmsg.Icon = [System.Drawing.Icon]::ExtractAssociatedIcon($path)
$balmsg.BalloonTipIcon = [System.Windows.Forms.ToolTipIcon]::Info
$balmsg.BalloonTipText = 'FilmsSeries Backed Up'
$balmsg.BalloonTipTitle = "Info DataBase"
$balmsg.Visible = $true
$balmsg.ShowBalloonTip(20000)