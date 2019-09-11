#coding=utf-8

#冒泡排序
def bubble_sort(input_list):
    if len(input_list) <= 0:
        return []
    else:
        for i in range(len(input_list)-1):
            print('第',i+1,'趟循环 \n')
            for j in range(len(input_list)-1-i):
                if input_list[j] > input_list[j+1]:
                    input_list[j],input_list[j+1] = input_list[j+1],input_list[j]
                print("第",j,'次排序后结果',input_list,'\n')


if __name__ == '__main__':
    input_list = [4,2,3,7,8,1]
    print('排序前：',input_list)

    sorted_list = bubble_sort(input_list)

    print('排序后：',sorted_list)
