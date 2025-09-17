Color_Text()
{
  echo -e " \e[0;$2m$1\e[0m"
}

Echo_Red()
{
  echo $(Color_Text "$1" "31")
}

Echo_Green()
{
  echo $(Color_Text "$1" "32")
}

Get_Bundles()
{
    local directory="app/bundles"
    local module=$1

    # 查找目录下的所有目录
    local bundles=($(ls "$directory"))

    local result=()
    for item in "${bundles[@]}"
    do
        local c="app/bundles/${item}/controller/${module}/"
        if [ -d "$c" ]; then
            result+=($c)
            c="app/bundles/${item}/request/"
            if [ -d "$c" ]; then
                result+=($c)
            fi
            c="app/bundles/${item}/response/"
            if [ -d "$c" ]; then
                result+=($c)
            fi
        fi
    done

    echo ${result[@]}
}
