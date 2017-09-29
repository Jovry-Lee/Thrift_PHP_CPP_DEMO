namespace cpp php_cpp_demo
namespace php php_cpp_demo

enum ResponseState {
    StateOK = 0,
    StateError = 1,
    StateEmpty = 2
}

struct Request {
    1: i32 studentID = 0
}

struct Response {
    1: i32 studentID = 0,
    2: string name,
    3: list<string> infos,
    4: ResponseState state
}

service PhpCppService {
    Response getStudentInfo(1: Request request);
}