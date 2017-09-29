cmake_minimum_required(VERSION 2.8)
PROJECT(RCPR_Server)

file(GLOB ALL_HEADERS ./*.h*)
file(GLOB ALL_SOURCES ./*.cpp*)

add_executable(php_cpp_demo.run ${ALL_HEADERS} ${ALL_SOURCES})
target_link_libraries(php_cpp_demo.run thrift)
